import { useMemo, useState } from 'react'
import { Link } from 'react-router-dom'
import Reveal from '../components/Reveal.jsx'
import { projects } from '../config/site.js'

export default function Portfolio() {
  const categories = useMemo(() => {
    const set = new Set(projects.map((p) => p.category))
    return ['All', ...Array.from(set)]
  }, [])
  const [active, setActive] = useState('All')

  const visible = active === 'All' ? projects : projects.filter((p) => p.category === active)

  return (
    <div className="container container--wide">
      <header className="page-hero">
        <p className="eyebrow">Portfolio</p>
        <h1 className="page-hero__title">Illustrative projects</h1>
        <p className="lead page-hero__lead">
          These are clearly-labelled demonstration projects created to show how we approach
          different kinds of work. They are fictional examples, not verified client engagements.
        </p>
      </header>

      <div className="filters" role="group" aria-label="Filter projects by category">
        {categories.map((category) => (
          <button
            key={category}
            type="button"
            className={`filter-chip ${active === category ? 'is-active' : ''}`}
            aria-pressed={active === category}
            onClick={() => setActive(category)}
          >
            {category}
          </button>
        ))}
      </div>

      <div className="project-grid">
        {visible.map((project, i) => (
          <Reveal key={project.slug} delay={i * 60}>
            <Link to={`/portfolio/${project.slug}`} className="project-card">
              <div className="project-card__meta">
                <span className="tag">{project.category}</span>
                <span className="tag tag--demo">Demonstration</span>
              </div>
              <h2 className="project-card__title">{project.title}</h2>
              <p className="project-card__summary">{project.summary}</p>
              <span className="service-card__link" style={{ marginTop: '0.4rem' }}>
                View project <span aria-hidden="true">→</span>
              </span>
            </Link>
          </Reveal>
        ))}
      </div>
    </div>
  )
}
