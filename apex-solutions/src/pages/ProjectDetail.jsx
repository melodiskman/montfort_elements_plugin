import { Link, useParams, Navigate } from 'react-router-dom'
import Reveal from '../components/Reveal.jsx'
import { projects } from '../config/site.js'

export default function ProjectDetail() {
  const { slug } = useParams()
  const project = projects.find((p) => p.slug === slug)
  if (!project) return <Navigate to="/404" replace />

  return (
    <div className="container container--wide">
      <header className="page-hero">
        <div style={{ display: 'flex', gap: '0.6rem', marginBottom: '0.9rem' }}>
          <span className="tag">{project.category}</span>
          <span className="tag tag--demo">Demonstration project</span>
        </div>
        <h1 className="page-hero__title">{project.title}</h1>
        <p className="lead page-hero__lead">{project.summary}</p>
      </header>

      <div className="prose-grid">
        <div>
          <Reveal>
            <div className="panel">
              <h2 className="panel__title">Overview</h2>
              <p>{project.overview}</p>
            </div>
          </Reveal>
          <Reveal delay={60}>
            <div className="panel">
              <h2 className="panel__title">Challenge</h2>
              <p>{project.challenge}</p>
            </div>
          </Reveal>
        </div>

        <div>
          <Reveal delay={40}>
            <div className="panel">
              <h2 className="panel__title">Approach</h2>
              <p>{project.approach}</p>
            </div>
          </Reveal>
          <Reveal delay={100}>
            <div className="panel">
              <h2 className="panel__title">Scope</h2>
              <ul className="bullet-list">
                {project.scope.map((item) => (
                  <li key={item}>{item}</li>
                ))}
              </ul>
            </div>
          </Reveal>
        </div>
      </div>

      <Reveal>
        <div className="panel" style={{ marginTop: 'clamp(20px, 3vw, 32px)' }}>
          <h2 className="panel__title">Illustrative outcomes</h2>
          <p>
            Described qualitatively — this demonstration project makes no numerical or verified
            performance claims.
          </p>
          <ul className="bullet-list" style={{ marginTop: '0.8rem' }}>
            {project.outcomes.map((item) => (
              <li key={item}>{item}</li>
            ))}
          </ul>
        </div>
      </Reveal>

      <section className="section">
        <Link to="/portfolio" className="btn btn--ghost btn--sm">
          <span aria-hidden="true">←</span> Back to portfolio
        </Link>
      </section>
    </div>
  )
}
