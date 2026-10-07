/**
 * Stylised, abstract professional portraits used as demonstration illustrations.
 * They are decorative artwork — not photographs of real people.
 */

const SKIN = '#e7c3a4'
const SKIN_SHADE = '#d6ab88'
const SHIRT = '#dbe6f4'
const JACKET = '#16305e'
const JACKET_LIGHT = '#1f4485'
const HAIR_DARK = '#26303f'
const HAIR_LIGHT = '#6d5238'

function Frame({ children, label }) {
  return (
    <svg viewBox="0 0 200 200" role="img" aria-label={label}>
      <defs>
        <radialGradient id="cp-glow" cx="50%" cy="38%" r="62%">
          <stop offset="0%" stopColor="rgba(120,196,240,0.55)" />
          <stop offset="100%" stopColor="rgba(120,196,240,0)" />
        </radialGradient>
        <linearGradient id="cp-jacket" x1="0" y1="0" x2="0" y2="1">
          <stop offset="0%" stopColor={JACKET_LIGHT} />
          <stop offset="100%" stopColor={JACKET} />
        </linearGradient>
      </defs>
      <rect width="200" height="200" fill="#0e1e40" />
      <circle cx="100" cy="84" r="78" fill="url(#cp-glow)" />
      <circle cx="100" cy="84" r="62" fill="rgba(24,85,216,0.28)" />
      {children}
    </svg>
  )
}

function Glasses({ y = 84 }) {
  return (
    <g stroke="#0d1c3a" strokeWidth="3" fill="rgba(190,220,255,0.22)">
      <rect x="70" y={y - 9} width="24" height="18" rx="7" />
      <rect x="106" y={y - 9} width="24" height="18" rx="7" />
      <path d="M94 84h12" fill="none" />
    </g>
  )
}

function Shoulders({ fill = 'url(#cp-jacket)' }) {
  return (
    <>
      <path d="M46 200c2-32 22-48 54-48s52 16 54 48Z" fill={fill} />
      <path d="M100 152 88 200h24Z" fill={SHIRT} />
    </>
  )
}

export function PortraitGlasses({ label }) {
  return (
    <Frame label={label}>
      <Shoulders />
      <rect x="90" y="126" width="20" height="24" rx="9" fill={SKIN_SHADE} />
      <ellipse cx="100" cy="98" rx="30" ry="34" fill={SKIN} />
      <path d="M70 92c2-24 14-34 30-34s28 10 30 34c-8-8-20-12-30-12s-22 4-30 12Z" fill={HAIR_DARK} />
      <ellipse cx="89" cy="100" rx="3" ry="3.4" fill="#1b2740" />
      <ellipse cx="111" cy="100" rx="3" ry="3.4" fill="#1b2740" />
      <path d="M92 114c5 4 11 4 16 0" stroke={SKIN_SHADE} strokeWidth="2.6" fill="none" strokeLinecap="round" />
      <Glasses />
    </Frame>
  )
}

export function PortraitTie({ label }) {
  return (
    <Frame label={label}>
      <Shoulders fill="url(#cp-jacket)" />
      <path d="M100 150l-9 12 9 12 9-12Z" fill="#c9d8ea" />
      <path d="M100 174l-7 26h14Z" fill="#1855d8" />
      <rect x="91" y="126" width="18" height="22" rx="8" fill={SKIN_SHADE} />
      <ellipse cx="100" cy="96" rx="29" ry="33" fill={SKIN} />
      <path d="M72 88c1-22 13-31 28-31s27 9 28 31c-6-9-17-13-28-13s-22 4-28 13Z" fill={HAIR_LIGHT} />
      <ellipse cx="90" cy="98" rx="3" ry="3.4" fill="#1b2740" />
      <ellipse cx="110" cy="98" rx="3" ry="3.4" fill="#1b2740" />
      <path d="M93 112c5 4 10 4 15 0" stroke={SKIN_SHADE} strokeWidth="2.6" fill="none" strokeLinecap="round" />
    </Frame>
  )
}

export function PortraitGlassesF({ label }) {
  return (
    <Frame label={label}>
      <Shoulders fill="#1b3a6e" />
      <path d="M100 150c-10 0-18 10-22 26l10 24h24l10-24c-4-16-12-26-22-26Z" fill="#24488c" />
      <rect x="91" y="124" width="18" height="24" rx="8" fill={SKIN_SHADE} />
      <ellipse cx="100" cy="96" rx="29" ry="33" fill={SKIN} />
      <path d="M69 100c-2-28 12-44 31-44s33 16 31 44c-3-14-9-20-15-22-8 8-26 10-38 4-4 4-7 9-9 18Z" fill={HAIR_DARK} />
      <ellipse cx="90" cy="98" rx="3" ry="3.4" fill="#1b2740" />
      <ellipse cx="110" cy="98" rx="3" ry="3.4" fill="#1b2740" />
      <path d="M93 112c5 4 10 4 15 0" stroke={SKIN_SHADE} strokeWidth="2.6" fill="none" strokeLinecap="round" />
      <Glasses y={82} />
    </Frame>
  )
}

const MAP = {
  glasses: PortraitGlasses,
  tie: PortraitTie,
  'glasses-f': PortraitGlassesF,
}

export default function CharacterPortrait({ variant = 'glasses', name }) {
  const Component = MAP[variant] || PortraitGlasses
  return <Component label={`Illustrated portrait representing ${name}`} />
}
