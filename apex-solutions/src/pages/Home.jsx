import { Link } from 'react-router-dom'
import HeroSection from '../components/HeroSection.jsx'
import TransitionRow from '../components/TransitionRow.jsx'
import ServiceGrid from '../components/ServiceGrid.jsx'
import CharacterFeature from '../components/CharacterFeature.jsx'
import ContactPanel from '../components/ContactPanel.jsx'
import Reveal from '../components/Reveal.jsx'
import { team, brandStatement, projects } from '../config/site.js'

export default function Home() {
  return (
    <>
      <HeroSection />

      <TransitionRow label="Our services" />

      <section className="section" style={{ paddingTop: 'clamp(24px, 3vw, 48px)' }}>
        <div className="container container--wide">
          <ServiceGrid
            title="Built around four disciplines"
            lead="Strategy, product, technology, and operations — joined up so ideas actually reach the market."
          />
        </div>
      </section>

      <section className="section">
        <div className="container container--wide">
          <div className="people">
            <Reveal className="speech-bubble">{brandStatement}</Reveal>

            <div className="people__profiles">
              {team.map((person, i) => (
                <Reveal key={person.name} delay={i * 80}>
                  <CharacterFeature person={person} />
                </Reveal>
              ))}
            </div>

            <div className="people__aside">
              <Reveal>
                <div className="info-panel">
                  <h2 className="info-panel__title">How we work with you</h2>
                  <p className="info-panel__text">
                    A small, senior team that stays close to the work from first conversation to
                    delivery.
                  </p>
                  <ul className="info-panel__list">
                    <li>Strategic thinking that frames the real decisions.</li>
                    <li>Practical implementation in small, reliable increments.</li>
                    <li>Collaborative delivery alongside your team.</li>
                  </ul>
                </div>
              </Reveal>

              <Reveal delay={80}>
                <ContactPanel compact />
              </Reveal>
            </div>
          </div>
        </div>
      </section>

      <section className="section" style={{ paddingTop: 0 }}>
        <div className="container container--wide">
          <div className="services-section__head">
            <div>
              <p className="eyebrow">Selected work</p>
              <h2 className="section-title">Illustrative projects</h2>
            </div>
            <Link to="/portfolio" className="btn btn--ghost btn--sm">
              View portfolio
            </Link>
          </div>

          <div className="project-grid">
            {projects.slice(0, 2).map((project, i) => (
              <Reveal key={project.slug} delay={i * 80}>
                <Link to={`/portfolio/${project.slug}`} className="project-card">
                  <div className="project-card__meta">
                    <span className="tag">{project.category}</span>
                    <span className="tag tag--demo">Demonstration</span>
                  </div>
                  <h3 className="project-card__title">{project.title}</h3>
                  <p className="project-card__summary">{project.summary}</p>
                </Link>
              </Reveal>
            ))}
          </div>
        </div>
      </section>
    </>
  )
}
