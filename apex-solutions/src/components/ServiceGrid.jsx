import { services } from '../config/site.js'
import ServiceCard from './ServiceCard.jsx'
import Reveal from './Reveal.jsx'

export default function ServiceGrid({ items = services, title, lead }) {
  return (
    <div>
      {title ? (
        <div className="services-section__head">
          <div>
            <p className="eyebrow">Capabilities</p>
            <h2 className="section-title">{title}</h2>
          </div>
          {lead ? <p className="lead" style={{ maxWidth: '42ch' }}>{lead}</p> : null}
        </div>
      ) : null}

      <div className="service-grid">
        {items.map((service, i) => (
          <Reveal key={service.slug} delay={i * 70}>
            <ServiceCard service={service} />
          </Reveal>
        ))}
      </div>
    </div>
  )
}
