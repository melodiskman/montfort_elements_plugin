import ContactPanel from '../components/ContactPanel.jsx'
import Reveal from '../components/Reveal.jsx'
import { brand } from '../config/site.js'

export default function Contact() {
  return (
    <div className="container container--wide">
      <header className="page-hero">
        <p className="eyebrow">Contact</p>
        <h1 className="page-hero__title">Start a conversation</h1>
        <p className="lead page-hero__lead">
          Tell us what you are working on. This is a demonstration website, so nothing is stored or
          delivered — the form below shows the intended experience.
        </p>
      </header>

      <div className="detail-layout">
        <Reveal>
          <ContactPanel />
        </Reveal>

        <Reveal delay={80}>
          <div className="panel">
            <h2 className="panel__title">What happens next</h2>
            <ul className="bullet-list">
              <li>We read your note and reply with a short, considered response.</li>
              <li>If it looks like a fit, we suggest a brief introductory call.</li>
              <li>We follow up with a clear outline of how we would approach the work.</li>
            </ul>
            <p style={{ marginTop: '1rem' }}>
              {brand.contact.email || brand.contact.phone
                ? 'Use the form and we will get back to you.'
                : 'Direct contact details have not been published yet — please use the form above.'}
            </p>
          </div>
        </Reveal>
      </div>
    </div>
  )
}
