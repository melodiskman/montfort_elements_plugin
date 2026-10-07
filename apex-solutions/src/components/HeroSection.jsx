import { Link } from 'react-router-dom'
import { hero } from '../config/site.js'
import HeroCityScene from './HeroCityScene.jsx'

export default function HeroSection() {
  return (
    <section className="hero">
      <div className="container container--wide">
        <div className="hero__grid">
          <div className="hero__content">
            <h1 className="hero__headline">
              {hero.headlineLines.map((line) => (
                <span key={line}>{line}</span>
              ))}
            </h1>
            <p className="hero__copy">{hero.copy}</p>
            <Link to={hero.cta.to} className="btn btn--primary">
              {hero.cta.label}
              <span className="btn__arrow" aria-hidden="true">
                →
              </span>
            </Link>
          </div>

          <div className="hero__visual">
            <HeroCityScene />
            <span className="visually-hidden">
              Dimensional illustration of a stylised city of blue and silver towers on a layered
              circular platform.
            </span>
          </div>
        </div>
      </div>
    </section>
  )
}
