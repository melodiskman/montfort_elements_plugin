import { useState } from 'react'
import { Link } from 'react-router-dom'
import { services, brand } from '../config/site.js'

const EMAIL_RE = /^[^\s@]+@[^\s@]+\.[^\s@]+$/

function validate(values, full) {
  const errors = {}
  if (full && !values.name.trim()) errors.name = 'Please enter your name.'
  if (!values.email.trim()) errors.email = 'Please enter your email address.'
  else if (!EMAIL_RE.test(values.email.trim())) errors.email = 'Please enter a valid email address.'
  if (!values.message.trim()) errors.message = 'Please tell us a little about your project.'
  return errors
}

/**
 * Contact form. No storage or delivery integration is configured in this project,
 * so a valid submission reports the demonstration status honestly rather than
 * pretending a message was sent.
 */
export default function ContactPanel({ compact = false }) {
  const full = !compact
  const [values, setValues] = useState({
    name: '',
    email: '',
    company: '',
    service: '',
    message: '',
  })
  const [errors, setErrors] = useState({})
  const [status, setStatus] = useState('idle') // idle | submitting | demo | error

  const update = (key) => (e) => {
    setValues((v) => ({ ...v, [key]: e.target.value }))
    if (errors[key]) setErrors((prev) => ({ ...prev, [key]: undefined }))
  }

  const onSubmit = (e) => {
    e.preventDefault()
    if (status === 'submitting') return
    const nextErrors = validate(values, full)
    setErrors(nextErrors)
    if (Object.keys(nextErrors).length > 0) {
      setStatus('error')
      return
    }
    setStatus('submitting')
    // Simulated async handling — no backend is wired up in this project.
    window.setTimeout(() => setStatus('demo'), 550)
  }

  const fieldClass = (key) => `field ${errors[key] ? 'field--invalid' : ''}`

  return (
    <section className="contact-panel" aria-labelledby={compact ? 'home-contact-title' : 'contact-title'}>
      <h2 className="contact-panel__title" id={compact ? 'home-contact-title' : 'contact-title'}>
        Let’s build what’s next
      </h2>
      <p className="contact-panel__sub">
        {compact
          ? 'Start a conversation — tell us what you are working on.'
          : 'Tell us about your project and we will get back to you.'}
      </p>

      <form className="contact-panel__form" onSubmit={onSubmit} noValidate>
        {full ? (
          <div className={fieldClass('name')}>
            <label htmlFor="cf-name">Name</label>
            <input
              id="cf-name"
              name="name"
              type="text"
              autoComplete="name"
              value={values.name}
              onChange={update('name')}
              aria-invalid={!!errors.name}
              aria-describedby={errors.name ? 'cf-name-error' : undefined}
            />
            {errors.name ? (
              <span className="field__error" id="cf-name-error">
                {errors.name}
              </span>
            ) : null}
          </div>
        ) : null}

        <div className={fieldClass('email')}>
          <label htmlFor="cf-email">Email</label>
          <input
            id="cf-email"
            name="email"
            type="email"
            autoComplete="email"
            value={values.email}
            onChange={update('email')}
            aria-invalid={!!errors.email}
            aria-describedby={errors.email ? 'cf-email-error' : undefined}
          />
          {errors.email ? (
            <span className="field__error" id="cf-email-error">
              {errors.email}
            </span>
          ) : null}
        </div>

        {full ? (
          <div className="field">
            <label htmlFor="cf-company">Company (optional)</label>
            <input
              id="cf-company"
              name="company"
              type="text"
              autoComplete="organization"
              value={values.company}
              onChange={update('company')}
            />
          </div>
        ) : null}

        {full ? (
          <div className="field">
            <label htmlFor="cf-service">Service of interest</label>
            <select id="cf-service" name="service" value={values.service} onChange={update('service')}>
              <option value="">Select a service</option>
              {services.map((s) => (
                <option key={s.slug} value={s.title}>
                  {s.title}
                </option>
              ))}
            </select>
          </div>
        ) : null}

        <div className={fieldClass('message')}>
          <label htmlFor="cf-message">{compact ? 'Additional info' : 'Project message'}</label>
          <textarea
            id="cf-message"
            name="message"
            rows={compact ? 3 : 5}
            value={values.message}
            onChange={update('message')}
            aria-invalid={!!errors.message}
            aria-describedby={errors.message ? 'cf-message-error' : undefined}
          />
          {errors.message ? (
            <span className="field__error" id="cf-message-error">
              {errors.message}
            </span>
          ) : null}
        </div>

        <div className="contact-panel__actions">
          <button type="submit" className="btn btn--primary" disabled={status === 'submitting'}>
            {status === 'submitting' ? 'Checking…' : compact ? 'Send' : 'Submit enquiry'}
            {status !== 'submitting' ? (
              <span className="btn__arrow" aria-hidden="true">
                →
              </span>
            ) : null}
          </button>
          {compact ? <Link to="/contact">Open the full contact form</Link> : null}
        </div>

        {status === 'error' && Object.keys(errors).length > 0 ? (
          <p className="form-status form-status--error" role="alert">
            Please correct the highlighted fields and try again.
          </p>
        ) : null}

        {status === 'demo' ? (
          <p className="form-status form-status--success" role="status">
            Your details look valid. This is a demonstration form — no message was sent and nothing
            was stored.
          </p>
        ) : null}

        <p className="form-note">
          This site is a design demonstration. No enquiry storage or email delivery is configured, so
          submissions are not sent anywhere.
          {brand.contact.email ? null : ' Contact details are not yet published.'}
        </p>
      </form>

      {brand.social.length > 0 ? (
        <div className="social-row">
          {brand.social.map((s) => (
            <a key={s.href} href={s.href} aria-label={s.label} rel="noreferrer noopener" target="_blank">
              {s.label.slice(0, 1)}
            </a>
          ))}
        </div>
      ) : null}
    </section>
  )
}
