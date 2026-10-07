import { Outlet, useLocation } from 'react-router-dom'
import { useEffect } from 'react'
import SiteHeader from './SiteHeader.jsx'
import SiteFooter from './SiteFooter.jsx'

const TITLES = {
  '/': 'Apex Solutions — Innovate. Transform. Thrive.',
  '/about': 'About — Apex Solutions',
  '/services': 'Services — Apex Solutions',
  '/portfolio': 'Portfolio — Apex Solutions',
  '/contact': 'Contact — Apex Solutions',
}

export default function Layout() {
  const { pathname } = useLocation()

  useEffect(() => {
    document.title = TITLES[pathname] || 'Apex Solutions'
  }, [pathname])

  return (
    <>
      <a href="#main" className="visually-hidden">
        Skip to content
      </a>
      <SiteHeader />
      <main id="main">
        <Outlet />
      </main>
      <SiteFooter />
    </>
  )
}
