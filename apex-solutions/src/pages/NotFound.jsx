import { Link } from 'react-router-dom'

export default function NotFound() {
  return (
    <div className="container container--wide">
      <div className="notfound">
        <p className="eyebrow">Error 404</p>
        <p className="notfound__code">404</p>
        <h1 className="page-hero__title" style={{ marginTop: 0 }}>
          This page could not be found
        </h1>
        <p className="lead" style={{ maxWidth: '52ch' }}>
          The page you were looking for may have moved or never existed. Let’s get you back on
          track.
        </p>
        <div style={{ display: 'flex', gap: '0.8rem', flexWrap: 'wrap' }}>
          <Link to="/" className="btn btn--primary">
            Back to home
          </Link>
          <Link to="/services" className="btn btn--ghost">
            Explore services
          </Link>
        </div>
      </div>
    </div>
  )
}
