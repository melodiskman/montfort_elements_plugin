import { useEffect, useRef, useState } from 'react'
import { NavLink, Link, useLocation } from 'react-router-dom'
import { navigation, primaryCta, brand } from '../config/site.js'
import { BrandLink } from './Logo.jsx'

export default function SiteHeader() {
  const [scrolled, setScrolled] = useState(false)
  const [menuOpen, setMenuOpen] = useState(false)
  const toggleRef = useRef(null)
  const location = useLocation()

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 12)
    onScroll()
    window.addEventListener('scroll', onScroll, { passive: true })
    return () => window.removeEventListener('scroll', onScroll)
  }, [])

  // Close the mobile menu on route change.
  useEffect(() => {
    setMenuOpen(false)
  }, [location.pathname])

  // Escape closes; lock body scroll while open; return focus to the toggle.
  useEffect(() => {
    if (!menuOpen) return
    const onKey = (e) => {
      if (e.key === 'Escape') {
        setMenuOpen(false)
        toggleRef.current?.focus()
      }
    }
    document.addEventListener('keydown', onKey)
    const prev = document.body.style.overflow
    document.body.style.overflow = 'hidden'
    return () => {
      document.removeEventListener('keydown', onKey)
      document.body.style.overflow = prev
    }
  }, [menuOpen])

  const navClass = ({ isActive }) => `site-nav__link ${isActive ? 'is-active' : ''}`
  const mobileClass = ({ isActive }) => `mobile-menu__link ${isActive ? 'is-active' : ''}`

  return (
    <header className={`site-header ${scrolled ? 'site-header--scrolled' : ''}`}>
      <div className="container container--wide site-header__inner">
        <Link to="/" aria-label={`${brand.name} — home`}>
          <BrandLink />
        </Link>

        <nav className="site-nav" aria-label="Primary">
          <ul className="site-nav__list">
            {navigation.map((item) => (
              <li key={item.to}>
                <NavLink to={item.to} end={item.to === '/'} className={navClass}>
                  {item.label}
                </NavLink>
              </li>
            ))}
          </ul>
        </nav>

        <div className="site-header__cta">
          <Link to={primaryCta.to} className="btn btn--primary btn--sm">
            {primaryCta.label}
          </Link>
        </div>

        <button
          ref={toggleRef}
          type="button"
          className="menu-toggle"
          aria-expanded={menuOpen}
          aria-controls="mobile-menu"
          aria-label={menuOpen ? 'Close menu' : 'Open menu'}
          onClick={() => setMenuOpen((v) => !v)}
        >
          <span className="menu-toggle__bars" aria-hidden="true">
            <span />
            <span />
            <span />
          </span>
        </button>
      </div>

      <div id="mobile-menu" className={`mobile-menu ${menuOpen ? 'is-open' : ''}`}>
        <nav aria-label="Mobile">
          <ul className="mobile-menu__list">
            {navigation.map((item) => (
              <li key={item.to}>
                <NavLink to={item.to} end={item.to === '/'} className={mobileClass}>
                  {item.label}
                </NavLink>
              </li>
            ))}
          </ul>
          <Link to={primaryCta.to} className="btn btn--primary mobile-menu__cta">
            {primaryCta.label}
          </Link>
        </nav>
      </div>
    </header>
  )
}
