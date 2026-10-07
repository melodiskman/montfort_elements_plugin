import { Component, Suspense, useEffect, useMemo, useRef, useState } from 'react'
import { Canvas, useFrame, useThree } from '@react-three/fiber'
import { usePrefersReducedMotion, usePointerFine } from '../lib/hooks.js'

const COBALT = '#1855d8'
const ELECTRIC = '#087df0'
const CYAN = '#4cbee9'
const SILVER = '#c3d2e0'
const GLASS = '#1b3a72'
const STEEL = '#8ea6c6'

/* ---------------------------------------------------------------- buildings */

function Bands({ y, radius, count = 3, spacing = 0.22, color = CYAN }) {
  return Array.from({ length: count }, (_, i) => (
    <mesh key={i} position={[0, y + i * spacing, 0]} rotation={[Math.PI / 2, 0, 0]}>
      <torusGeometry args={[radius, 0.012, 6, 28]} />
      <meshStandardMaterial color={color} emissive={color} emissiveIntensity={0.7} roughness={0.4} />
    </mesh>
  ))
}

function Building({ spec }) {
  const { position, type } = spec
  const [x, z] = position

  if (type === 'faceted') {
    return (
      <group position={[x, 0, z]}>
        <mesh castShadow position={[0, spec.height / 2, 0]}>
          <cylinderGeometry args={[spec.radius, spec.radius * 1.08, spec.height, 6]} />
          <meshStandardMaterial color={COBALT} metalness={0.72} roughness={0.26} />
        </mesh>
        <mesh position={[0, spec.height + 0.26, 0]}>
          <coneGeometry args={[spec.radius * 1.02, 0.52, 6]} />
          <meshStandardMaterial color={ELECTRIC} metalness={0.6} roughness={0.28} />
        </mesh>
        <Bands y={spec.height * 0.35} radius={spec.radius * 1.02} count={3} spacing={0.2} />
      </group>
    )
  }

  if (type === 'cylinder') {
    return (
      <group position={[x, 0, z]}>
        <mesh castShadow position={[0, spec.height / 2, 0]}>
          <cylinderGeometry args={[spec.radius, spec.radius, spec.height, 28]} />
          <meshStandardMaterial color={STEEL} metalness={0.86} roughness={0.24} />
        </mesh>
        <mesh position={[0, spec.height + 0.09, 0]}>
          <cylinderGeometry args={[spec.radius * 0.72, spec.radius * 0.72, 0.18, 24]} />
          <meshStandardMaterial color={GLASS} metalness={0.5} roughness={0.3} />
        </mesh>
        <Bands y={spec.height * 0.42} radius={spec.radius * 1.01} count={3} spacing={0.24} color={CYAN} />
      </group>
    )
  }

  // default: rectangular tower
  return (
    <group position={[x, 0, z]}>
      <mesh castShadow position={[0, spec.height / 2, 0]}>
        <boxGeometry args={[spec.w, spec.height, spec.d]} />
        <meshStandardMaterial color={spec.color || GLASS} metalness={0.62} roughness={0.3} />
      </mesh>
      {spec.bands ? (
        <Bands y={spec.height * 0.3} radius={Math.max(spec.w, spec.d) * 0.72} count={4} spacing={0.2} />
      ) : null}
      <mesh position={[0, spec.height + 0.05, 0]}>
        <boxGeometry args={[spec.w * 0.86, 0.1, spec.d * 0.86]} />
        <meshStandardMaterial color={SILVER} metalness={0.8} roughness={0.22} />
      </mesh>
    </group>
  )
}

/* ---------------------------------------------------------------- platform */

function Platform() {
  return (
    <group position={[0, -0.18, 0]}>
      {/* soft contact shadow / reflection disc */}
      <mesh rotation={[-Math.PI / 2, 0, 0]} position={[0, -0.02, 0]}>
        <circleGeometry args={[3.9, 64]} />
        <meshBasicMaterial color="#050c1c" transparent opacity={0.5} />
      </mesh>

      {/* stacked metallic rings with dark gaps */}
      {[
        { y: 0, r: 3.35, h: 0.22, c: SILVER, m: 0.85, ro: 0.28 },
        { y: 0.24, r: 3.1, h: 0.16, c: GLASS, m: 0.5, ro: 0.4 },
        { y: 0.42, r: 2.9, h: 0.2, c: STEEL, m: 0.88, ro: 0.24 },
      ].map((ring, i) => (
        <mesh key={i} castShadow position={[0, ring.y, 0]}>
          <cylinderGeometry args={[ring.r, ring.r, ring.h, 64]} />
          <meshStandardMaterial color={ring.c} metalness={ring.m} roughness={ring.ro} />
        </mesh>
      ))}

      {/* top deck */}
      <mesh position={[0, 0.56, 0]}>
        <cylinderGeometry args={[2.78, 2.78, 0.12, 64]} />
        <meshStandardMaterial color="#20365f" metalness={0.55} roughness={0.34} />
      </mesh>

      {/* cobalt/cyan accent rings around the edges */}
      <mesh position={[0, 0.13, 0]} rotation={[Math.PI / 2, 0, 0]}>
        <torusGeometry args={[3.36, 0.028, 8, 96]} />
        <meshStandardMaterial color={CYAN} emissive={CYAN} emissiveIntensity={0.85} roughness={0.35} />
      </mesh>
      <mesh position={[0, 0.53, 0]} rotation={[Math.PI / 2, 0, 0]}>
        <torusGeometry args={[2.79, 0.024, 8, 96]} />
        <meshStandardMaterial color={ELECTRIC} emissive={ELECTRIC} emissiveIntensity={0.7} roughness={0.35} />
      </mesh>
    </group>
  )
}

/* ---------------------------------------------------------------- clouds */

function CloudCluster({ position, scale = 1, speed = 0.4, phase = 0, reduced }) {
  const ref = useRef()
  const puffs = useMemo(
    () => [
      [0, 0, 0, 0.42],
      [0.36, 0.05, 0.08, 0.3],
      [-0.34, 0.02, -0.06, 0.28],
      [0.12, 0.16, -0.14, 0.24],
      [-0.14, 0.12, 0.14, 0.22],
    ],
    [],
  )

  useFrame((state) => {
    if (reduced || !ref.current) return
    const t = state.clock.elapsedTime
    ref.current.position.y = position[1] + Math.sin(t * speed + phase) * 0.075
    ref.current.position.x = position[0] + Math.cos(t * speed * 0.7 + phase) * 0.05
  })

  return (
    <group ref={ref} position={position} scale={scale}>
      {puffs.map((p, i) => (
        <mesh key={i} position={[p[0], p[1], p[2]]}>
          <sphereGeometry args={[p[3], 20, 20]} />
          <meshStandardMaterial
            color="#eef4fb"
            metalness={0.25}
            roughness={0.55}
            emissive="#9fc4e8"
            emissiveIntensity={0.14}
          />
        </mesh>
      ))}
    </group>
  )
}

/* ---------------------------------------------------------------- rig */

function CameraRig({ children, reduced, pointerFine }) {
  const group = useRef()
  const { pointer } = useThree()

  useFrame((_, delta) => {
    if (!group.current) return
    const targetY = pointerFine && !reduced ? pointer.x * 0.32 : 0
    const targetX = pointerFine && !reduced ? -pointer.y * 0.14 : 0
    group.current.rotation.y += (targetY - group.current.rotation.y) * Math.min(1, delta * 2.2)
    group.current.rotation.x += (targetX - group.current.rotation.x) * Math.min(1, delta * 2.2)
  })

  return <group ref={group}>{children}</group>
}

function SceneContent({ reduced, pointerFine }) {
  const buildings = useMemo(
    () => [
      { type: 'faceted', position: [-0.15, -0.15], radius: 0.44, height: 2.85 },
      { type: 'cylinder', position: [1.05, 0.55], radius: 0.33, height: 2.0 },
      { type: 'cylinder', position: [-1.25, 0.85], radius: 0.27, height: 1.55 },
      { type: 'box', position: [0.62, -1.0], w: 0.52, d: 0.52, height: 1.3, color: GLASS, bands: true },
      { type: 'box', position: [-0.85, -1.05], w: 0.46, d: 0.46, height: 1.65, color: '#1e3a6e' },
      { type: 'box', position: [1.55, -0.35], w: 0.4, d: 0.4, height: 0.95, color: GLASS, bands: true },
      { type: 'box', position: [-1.6, -0.5], w: 0.36, d: 0.36, height: 0.8, color: '#254a86' },
      { type: 'box', position: [0.1, 1.35], w: 0.44, d: 0.44, height: 1.1, color: GLASS },
      { type: 'box', position: [1.35, 1.15], w: 0.3, d: 0.3, height: 0.7, color: '#1e3a6e' },
      { type: 'box', position: [-1.5, 1.35], w: 0.32, d: 0.32, height: 0.62, color: '#254a86', bands: true },
      { type: 'box', position: [0.55, 0.9], w: 0.26, d: 0.26, height: 0.5, color: GLASS },
      { type: 'box', position: [-0.5, 1.7], w: 0.24, d: 0.24, height: 0.44, color: '#1e3a6e' },
    ],
    [],
  )

  const objects = useMemo(
    () => [
      [2.2, 0.95, 0.4, 0.13],
      [-2.35, 0.7, 0.7, 0.11],
      [1.9, 0.5, -1.5, 0.1],
      [-1.9, 1.25, 1.1, 0.09],
    ],
    [],
  )

  return (
    <CameraRig reduced={reduced} pointerFine={pointerFine}>
      <group position={[0, -1.15, 0]}>
        <Platform />

        {buildings.map((spec, i) => (
          <Building key={i} spec={spec} />
        ))}

        {objects.map(([x, y, z, r], i) => (
          <mesh key={i} position={[x, y, z]} castShadow>
            <icosahedronGeometry args={[r, 0]} />
            <meshStandardMaterial color={SILVER} metalness={0.9} roughness={0.18} />
          </mesh>
        ))}

        <CloudCluster position={[-2.4, 2.1, 0.9]} scale={1.05} phase={0.4} reduced={reduced} />
        <CloudCluster position={[2.5, 1.7, 0.4]} scale={0.85} phase={2.1} reduced={reduced} />
        <CloudCluster position={[0.4, 2.6, -1.5]} scale={0.75} phase={4.2} reduced={reduced} />
      </group>
    </CameraRig>
  )
}

/* ---------------------------------------------------------------- wrapper */

function supportsWebGL() {
  try {
    const canvas = document.createElement('canvas')
    return !!(
      window.WebGLRenderingContext &&
      (canvas.getContext('webgl') || canvas.getContext('experimental-webgl'))
    )
  } catch {
    return false
  }
}

class SceneErrorBoundary extends Component {
  constructor(props) {
    super(props)
    this.state = { failed: false }
  }
  static getDerivedStateFromError() {
    return { failed: true }
  }
  componentDidCatch() {
    /* Swallow: the CSS fallback below keeps the hero looking intentional. */
  }
  render() {
    if (this.state.failed) return this.props.fallback
    return this.props.children
  }
}

export default function HeroCityScene() {
  const reduced = usePrefersReducedMotion()
  const pointerFine = usePointerFine()
  const [webgl, setWebgl] = useState(null)
  const [active, setActive] = useState(true)
  const wrapRef = useRef(null)

  useEffect(() => {
    setWebgl(supportsWebGL())
  }, [])

  // Pause the render loop when the scene is offscreen or the tab is hidden.
  useEffect(() => {
    const node = wrapRef.current
    if (!node || typeof IntersectionObserver === 'undefined') return
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((e) => setActive(e.isIntersecting && !document.hidden))
    })
    observer.observe(node)
    const onVis = () => setActive(!document.hidden)
    document.addEventListener('visibilitychange', onVis)
    return () => {
      observer.disconnect()
      document.removeEventListener('visibilitychange', onVis)
    }
  }, [])

  const fallback = <div className="hero__fallback" aria-hidden="true" />

  return (
    <div className="hero__canvas" ref={wrapRef}>
      {webgl ? (
        <SceneErrorBoundary fallback={fallback}>
          <Canvas
            dpr={[1, 1.8]}
            shadows={false}
            frameloop={active ? 'always' : 'never'}
            camera={{ position: [0, 2.35, 8.2], fov: 34 }}
            gl={{ antialias: true, alpha: true, powerPreference: 'high-performance' }}
            onCreated={({ gl }) => gl.setClearColor(0x000000, 0)}
          >
            <ambientLight intensity={0.75} />
            <hemisphereLight args={['#a9ccf5', '#0a1330', 1.15]} />
            <directionalLight position={[5, 8, 5]} intensity={2.6} color="#dce9ff" />
            <directionalLight position={[-6, 4, -4]} intensity={1.1} color={CYAN} />
            <pointLight position={[0, 2.4, 1.6]} intensity={2.2} color={ELECTRIC} decay={0} />
            <Suspense fallback={null}>
              <SceneContent reduced={reduced} pointerFine={pointerFine} />
            </Suspense>
          </Canvas>
        </SceneErrorBoundary>
      ) : (
        fallback
      )}
    </div>
  )
}
