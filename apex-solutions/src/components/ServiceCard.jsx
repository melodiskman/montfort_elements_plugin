import { Link } from 'react-router-dom'
import ServiceIllustration from './ServiceIllustration.jsx'

export default function ServiceCard({ service }) {
  const href = `/services/${service.slug}`

  return (
    <article className={`service-card ${service.light ? 'service-card--light' : ''}`}>
      <div className="service-card__top">
        <span className="service-card__category">{service.category}</span>
        <Link to={href} className="service-card__action" aria-label={`Open ${service.title}`}>
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
            <path
              d="M3 11 11 3M5 3h6v6"
              stroke="currentColor"
              strokeWidth="1.6"
              strokeLinecap="round"
              strokeLinejoin="round"
            />
          </svg>
        </Link>
      </div>

      <div className="service-card__art" aria-hidden="true">
        <ServiceIllustration variant={service.illustration} />
      </div>

      <h3 className="service-card__title">{service.title}</h3>

      <Link to={href} className="service-card__link">
        Learn more
        <span aria-hidden="true">→</span>
      </Link>
    </article>
  )
}
