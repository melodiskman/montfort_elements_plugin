export default function TransitionRow({ label = 'Our services' }) {
  return (
    <div className="container container--wide">
      <div className="transition-row" aria-hidden="true">
        <span className="transition-row__rule" />
        <span className="transition-row__marks">
          <span />
          <span />
        </span>
        <span className="transition-row__label">{label}</span>
        <span className="transition-row__marks">
          <span />
          <span />
        </span>
        <span className="transition-row__rule" />
      </div>
    </div>
  )
}
