import { Link } from 'react-router-dom'
import { brand, navigation, services } from '../config/site.js'
import { BrandLink } from './Logo.jsx'

export default function SiteFooter() {
  const year = new Date().getFullYear()
  return (
    <footer className="site-footer">
      <div className="container container--wide">
        <div className="site-footer__grid">
          <div>
            <BrandLink />
            <p className="site-footer__tagline">{brand.intro}</p>
          </div>

          <div>
            <h2 className="footer-heading">Navigate</h2>
            <ul className="footer-links">
              {navigation.map((item) => (
                <li key={item.to}>
                  <Link to={item.to}>{item.label}</Link>
                </li>
              ))}
            </ul>
          </div>

          <div>
            <h2 className="footer-heading">Services</h2>
            <ul className="footer-links">
              {services.map((service) => (
                <li key={service.slug}>
                  <Link to={`/services/${service.slug}`}>{service.title}</Link>
                </li>
              ))}
            </ul>
          </div>
        </div>

        <div className="site-footer__bottom">
          <span>
            © {year} {brand.name}. Demonstration website.
          </span>
          <span>Content shown is illustrative and not verified client information.</span>
        </div>
      </div>
    </footer>
  )
}
