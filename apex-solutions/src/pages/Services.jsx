import { Link } from 'react-router-dom'
import Reveal from '../components/Reveal.jsx'
import ServiceIllustration from '../components/ServiceIllustration.jsx'
import { services } from '../config/site.js'

export default function Services() {
  return (
    <div className="container container--wide">
      <header className="page-hero">
        <p className="eyebrow">Services</p>
        <h1 className="page-hero__title">Four disciplines, joined up</h1>
        <p className="lead page-hero__lead">
          Each engagement is shaped around your context, but the underlying disciplines stay the
          same. Explore what each one covers, what you receive, and how we work.
        </p>
      </header>

      <div style={{ display: 'grid', gap: 'clamp(20px, 3vw, 32px)' }}>
        {services.map((service, i) => (
          <Reveal key={service.slug} delay={i * 60}>
            <article className="panel detail-layout">
              <div>
                <p className="eyebrow">{service.category}</p>
                <h2 className="panel__title" style={{ fontSize: 'clamp(1.4rem, 2.4vw, 1.9rem)', marginTop: '0.4rem' }}>
                  {service.title}
                </h2>
                <p>{service.summary}</p>

                <h3 className="footer-heading" style={{ marginTop: '1.4rem' }}>
                  Scope
                </h3>
                <ul className="bullet-list">
                  {service.scope.map((item) => (
                    <li key={item}>{item}</li>
                  ))}
                </ul>

                <div style={{ marginTop: '1.4rem' }}>
                  <Link to={`/services/${service.slug}`} className="btn btn--primary btn--sm">
                    View {service.title}
                    <span className="btn__arrow" aria-hidden="true">
                      →
                    </span>
                  </Link>
                </div>
              </div>

              <div className="detail-visual" aria-hidden="true">
                <ServiceIllustration variant={service.illustration} />
              </div>
            </article>
          </Reveal>
        ))}
      </div>
    </div>
  )
}
