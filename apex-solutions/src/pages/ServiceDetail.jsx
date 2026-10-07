import { Link, useParams, Navigate } from 'react-router-dom'
import Reveal from '../components/Reveal.jsx'
import ServiceIllustration from '../components/ServiceIllustration.jsx'
import { services } from '../config/site.js'

export default function ServiceDetail() {
  const { slug } = useParams()
  const service = services.find((s) => s.slug === slug)
  if (!service) return <Navigate to="/404" replace />

  const others = services.filter((s) => s.slug !== slug)

  return (
    <div className="container container--wide">
      <header className="page-hero">
        <p className="eyebrow">{service.category}</p>
        <h1 className="page-hero__title">{service.title}</h1>
        <p className="lead page-hero__lead">{service.summary}</p>
      </header>

      <div className="detail-layout">
        <div>
          <Reveal>
            <div className="panel">
              <h2 className="panel__title">What this covers</h2>
              <ul className="bullet-list">
                {service.scope.map((item) => (
                  <li key={item}>{item}</li>
                ))}
              </ul>
            </div>
          </Reveal>

          <Reveal delay={60}>
            <div className="panel">
              <h2 className="panel__title">Example deliverables</h2>
              <ul className="bullet-list">
                {service.deliverables.map((item) => (
                  <li key={item}>{item}</li>
                ))}
              </ul>
            </div>
          </Reveal>

          <Reveal delay={120}>
            <div className="panel">
              <h2 className="panel__title">How we work</h2>
              <div className="step-list" style={{ marginTop: '1rem' }}>
                {service.process.map((step) => {
                  const [title, body] = step.split(' — ')
                  return (
                    <div className="step" key={step}>
                      <span className="step__index" aria-hidden="true" />
                      <div className="step__body">
                        <h3 className="panel__title" style={{ fontSize: '1rem', marginBottom: '0.25rem' }}>
                          {title}
                        </h3>
                        <p>{body}</p>
                      </div>
                    </div>
                  )
                })}
              </div>
            </div>
          </Reveal>
        </div>

        <div>
          <Reveal>
            <div className="detail-visual" style={{ aspectRatio: '1 / 1' }} aria-hidden="true">
              <ServiceIllustration variant={service.illustration} />
            </div>
          </Reveal>

          <Reveal delay={80}>
            <div className="panel" style={{ marginTop: '1.5rem' }}>
              <h2 className="panel__title">Interested in {service.title.toLowerCase()}?</h2>
              <p>Tell us what you are working on and we will suggest a sensible starting point.</p>
              <div style={{ marginTop: '1rem' }}>
                <Link to="/contact" className="btn btn--primary btn--sm">
                  Start a conversation
                </Link>
              </div>
            </div>
          </Reveal>
        </div>
      </div>

      <section className="section">
        <h2 className="section-title" style={{ marginBottom: '1.5rem' }}>
          Other services
        </h2>
        <ul className="footer-links" style={{ gap: '0.8rem' }}>
          {others.map((s) => (
            <li key={s.slug}>
              <Link to={`/services/${s.slug}`}>
                {s.title} <span aria-hidden="true">→</span>
              </Link>
            </li>
          ))}
        </ul>
      </section>
    </div>
  )
}
