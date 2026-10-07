import { brand } from '../config/site.js'

/** Compact white geometric "A" mark. Decorative — the brand name carries the meaning. */
export default function Logo({ size = 26 }) {
  return (
    <svg
      className="brand__mark"
      width={size}
      height={size}
      viewBox="0 0 32 32"
      fill="none"
      aria-hidden="true"
      focusable="false"
    >
      <path
        d="M16 4 28 28h-5.6l-2.2-4.7H11.8L9.6 28H4L16 4Z"
        fill="currentColor"
      />
      <path d="M14 18h4l-2-4.4L14 18Z" fill="#101D43" />
    </svg>
  )
}

export function BrandLink({ size = 26 }) {
  return (
    <span className="brand">
      <Logo size={size} />
      <span className="brand__name">{brand.name}</span>
    </span>
  )
}
