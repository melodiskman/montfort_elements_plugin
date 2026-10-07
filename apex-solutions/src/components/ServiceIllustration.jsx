/**
 * Dimensional SVG illustrations for the service cards. They share one lighting
 * model (light from upper-left, cobalt bodies, cyan rim) so the row reads as a set.
 */

const VIEW = '0 0 200 150'

function Cube({ cx, cy, s = 26, h = 26 }) {
  const top = `${cx},${cy - s * 0.5} ${cx + s},${cy} ${cx},${cy + s * 0.5} ${cx - s},${cy}`
  const left = `${cx - s},${cy} ${cx},${cy + s * 0.5} ${cx},${cy + s * 0.5 + h} ${cx - s},${cy + h}`
  const right = `${cx},${cy + s * 0.5} ${cx + s},${cy} ${cx + s},${cy + h} ${cx},${cy + s * 0.5 + h}`
  return (
    <g>
      <polygon points={left} fill="url(#cubeLeft)" />
      <polygon points={right} fill="url(#cubeRight)" />
      <polygon points={top} fill="url(#cubeTop)" stroke="rgba(76,190,233,0.5)" strokeWidth="0.6" />
    </g>
  )
}

function Cylinder({ cx, base, rx = 20, ry = 7, h = 40 }) {
  return (
    <g>
      <path
        d={`M ${cx - rx} ${base - h} L ${cx - rx} ${base} A ${rx} ${ry} 0 0 0 ${cx + rx} ${base} L ${cx + rx} ${base - h} Z`}
        fill="url(#cylBody)"
      />
      <ellipse cx={cx} cy={base - h} rx={rx} ry={ry} fill="url(#cylTop)" />
      <ellipse cx={cx} cy={base - h} rx={rx} ry={ry} fill="none" stroke="rgba(76,190,233,0.55)" strokeWidth="0.7" />
    </g>
  )
}

function Defs() {
  return (
    <defs>
      <linearGradient id="cubeTop" x1="0" y1="0" x2="1" y2="1">
        <stop offset="0%" stopColor="#5aa9f5" />
        <stop offset="100%" stopColor="#1855d8" />
      </linearGradient>
      <linearGradient id="cubeLeft" x1="0" y1="0" x2="0" y2="1">
        <stop offset="0%" stopColor="#123c93" />
        <stop offset="100%" stopColor="#0b2358" />
      </linearGradient>
      <linearGradient id="cubeRight" x1="0" y1="0" x2="0" y2="1">
        <stop offset="0%" stopColor="#1c56c0" />
        <stop offset="100%" stopColor="#102f74" />
      </linearGradient>
      <linearGradient id="cylBody" x1="0" y1="0" x2="1" y2="0">
        <stop offset="0%" stopColor="#0e2a63" />
        <stop offset="45%" stopColor="#3f86e6" />
        <stop offset="100%" stopColor="#0e2a63" />
      </linearGradient>
      <linearGradient id="cylTop" x1="0" y1="0" x2="1" y2="1">
        <stop offset="0%" stopColor="#e8f3ff" />
        <stop offset="100%" stopColor="#8fb6e6" />
      </linearGradient>
      <linearGradient id="blockTop" x1="0" y1="0" x2="1" y2="1">
        <stop offset="0%" stopColor="#3f8df0" />
        <stop offset="100%" stopColor="#1450c4" />
      </linearGradient>
      <linearGradient id="ringMetal" x1="0" y1="0" x2="1" y2="1">
        <stop offset="0%" stopColor="#e6eef8" />
        <stop offset="55%" stopColor="#9fb4cd" />
        <stop offset="100%" stopColor="#5c7796" />
      </linearGradient>
      <radialGradient id="glow" cx="50%" cy="45%" r="60%">
        <stop offset="0%" stopColor="rgba(76,190,233,0.35)" />
        <stop offset="100%" stopColor="rgba(76,190,233,0)" />
      </radialGradient>
    </defs>
  )
}

function Cubes() {
  return (
    <svg viewBox={VIEW} role="img" aria-label="Cluster of glossy blue cubes">
      <Defs />
      <ellipse cx="100" cy="120" rx="70" ry="16" fill="url(#glow)" />
      <Cube cx="100" cy="70" s="26" h="26" />
      <Cube cx="66" cy="92" s="20" h="20" />
      <Cube cx="134" cy="92" s="20" h="20" />
      <Cube cx="100" cy="112" s="18" h="14" />
    </svg>
  )
}

function Cylinders() {
  return (
    <svg viewBox={VIEW} role="img" aria-label="Blue and silver cylinders at different heights">
      <Defs />
      <ellipse cx="100" cy="122" rx="74" ry="17" fill="url(#glow)" />
      <Cylinder cx="66" base="116" rx="17" ry="6" h="34" />
      <Cylinder cx="100" base="120" rx="21" ry="7.5" h="66" />
      <Cylinder cx="136" base="116" rx="15" ry="5.5" h="46" />
    </svg>
  )
}

function Blocks() {
  const rows = [
    { y: 104, xs: [58, 82, 106, 130], h: 12 },
    { y: 88, xs: [70, 94, 118], h: 20 },
    { y: 72, xs: [82, 106], h: 28 },
    { y: 58, xs: [94], h: 34 },
  ]
  return (
    <svg viewBox={VIEW} role="img" aria-label="Ordered field of raised cobalt blocks">
      <Defs />
      <ellipse cx="100" cy="122" rx="72" ry="16" fill="url(#glow)" />
      {rows.map((row, ri) =>
        row.xs.map((x, xi) => {
          const s = 17
          const top = `${x},${row.y - s * 0.5} ${x + s},${row.y} ${x},${row.y + s * 0.5} ${x - s},${row.y}`
          const left = `${x - s},${row.y} ${x},${row.y + s * 0.5} ${x},${row.y + s * 0.5 + row.h} ${x - s},${row.y + row.h}`
          const right = `${x},${row.y + s * 0.5} ${x + s},${row.y} ${x + s},${row.y + row.h} ${x},${row.y + s * 0.5 + row.h}`
          return (
            <g key={`${ri}-${xi}`}>
              <polygon points={left} fill="url(#cubeLeft)" />
              <polygon points={right} fill="url(#cubeRight)" />
              <polygon points={top} fill="url(#blockTop)" stroke="rgba(76,190,233,0.45)" strokeWidth="0.6" />
            </g>
          )
        }),
      )}
    </svg>
  )
}

function Rings() {
  return (
    <svg viewBox={VIEW} role="img" aria-label="Interlocking metallic rings on a square platform">
      <Defs />
      <ellipse cx="100" cy="122" rx="70" ry="16" fill="url(#glow)" />
      {/* square platform */}
      <polygon points="100,96 148,116 100,136 52,116" fill="url(#cubeLeft)" />
      <polygon points="100,96 148,116 148,122 100,142 52,122 52,116" fill="#0b2358" opacity="0.85" />
      <polygon points="100,96 148,116 100,136 52,116" fill="none" stroke="rgba(76,190,233,0.4)" strokeWidth="0.7" />
      {/* interlocking rings */}
      <ellipse cx="88" cy="72" rx="30" ry="15" fill="none" stroke="url(#ringMetal)" strokeWidth="8" />
      <ellipse cx="112" cy="72" rx="30" ry="15" fill="none" stroke="url(#ringMetal)" strokeWidth="8" opacity="0.92" />
      <ellipse cx="88" cy="72" rx="30" ry="15" fill="none" stroke="rgba(255,255,255,0.35)" strokeWidth="1" />
      <ellipse cx="112" cy="72" rx="30" ry="15" fill="none" stroke="rgba(76,190,233,0.45)" strokeWidth="1" />
    </svg>
  )
}

const VARIANTS = {
  cubes: Cubes,
  cylinders: Cylinders,
  blocks: Blocks,
  rings: Rings,
}

export default function ServiceIllustration({ variant = 'cubes' }) {
  const Component = VARIANTS[variant] || Cubes
  return <Component />
}
