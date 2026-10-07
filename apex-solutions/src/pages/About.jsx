import { Link } from 'react-router-dom'
import Reveal from '../components/Reveal.jsx'
import { brand, services } from '../config/site.js'

const principles = [
  {
    title: 'Clarity before cleverness',
    body: 'We start by framing the problem properly. A clear decision beats an elaborate deliverable.',
  },
  {
    title: 'Small steps, real feedback',
    body: 'We ship in increments you can react to, so direction stays grounded in reality.',
  },
  {
    title: 'Own it end to end',
    body: 'We stay accountable from the first conversation through to delivery and beyond.',
  },
]

const process = [
  { title: 'Discover', body: 'Interviews, data review, and context gathering to understand what is really going on.' },
  { title: 'Frame', body: 'Define the decisions that matter and the constraints around them.' },
  { title: 'Design', body: 'Prototype the approach early and test it against real use.' },
  { title: 'Deliver', body: 'Build and launch in small increments, measuring as we go.' },
]

export default function About() {
  return (
    <div className="container container--wide">
      <header className="page-hero">
        <p className="eyebrow">About</p>
        <h1 className="page-hero__title">A demonstration studio for ambitious work</h1>
        <p className="lead page-hero__lead">
          {brand.name} is an illustrative company used to demonstrate this website. In this fictional
          setting we are a small, senior team that helps organisations turn ambitious ideas into
          practical, working outcomes.
        </p>
      </header>

      <section className="section" style={{ paddingTop: 0 }}>
        <div className="prose-grid">
          <Reveal>
            <div className="panel">
              <h2 className="panel__title">Our approach</h2>
              <p>
                We combine strategy, design, and engineering in one continuous thread. Rather than
                handing work between disconnected teams, we keep the same small group close to the
                problem from beginning to end — so decisions stay coherent and momentum is never
                lost in translation.
              </p>
              <p style={{ marginTop: '0.9rem' }}>
                Everything we do is grounded in the belief that good work is equal parts ambition and
                discipline.
              </p>
            </div>
          </Reveal>

          <Reveal delay={80}>
            <div className="panel">
              <h2 className="panel__title">Working principles</h2>
              <ul className="bullet-list">
                {principles.map((p) => (
                  <li key={p.title}>
                    <span>
                      <strong style={{ color: 'var(--white)' }}>{p.title}.</strong> {p.body}
                    </span>
                  </li>
                ))}
              </ul>
            </div>
          </Reveal>
        </div>
      </section>

      <section className="section" style={{ paddingTop: 0 }}>
        <Reveal>
          <div className="panel">
            <h2 className="panel__title">Delivery process</h2>
            <p>Four stages that keep work moving without losing sight of the bigger picture.</p>
            <div className="step-list" style={{ marginTop: '1.4rem' }}>
              {process.map((step) => (
                <div className="step" key={step.title}>
                  <span className="step__index" aria-hidden="true" />
                  <div className="step__body">
                    <h3 className="panel__title" style={{ fontSize: '1rem', marginBottom: '0.25rem' }}>
                      {step.title}
                    </h3>
                    <p>{step.body}</p>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </Reveal>
      </section>

      <section className="section" style={{ paddingTop: 0 }}>
        <div className="panel" style={{ display: 'flex', flexWrap: 'wrap', gap: '1.5rem', alignItems: 'center', justifyContent: 'space-between' }}>
          <div>
            <h2 className="panel__title">Where we can help</h2>
            <p>{services.map((s) => s.title).join(' · ')}</p>
          </div>
          <Link to="/contact" className="btn btn--primary">
            Start a conversation
          </Link>
        </div>
      </section>
    </div>
  )
}
