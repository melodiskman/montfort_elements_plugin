# Apex Solutions — website

## Overview
A React single-page website (`apex-solutions/`) built to the attached design references.
The repo also contains `montfort-elementor-widgets/`, a legacy WordPress plugin that is **not**
part of this site and is not run by the current Compose setup.

## Stack
- Vite 6 + React 18 + React Router 6
- React Three Fiber / three.js for the hero architectural scene
- Plain CSS with design tokens (no CSS framework)

## Running
```bash
docker compose -f docker-compose.base44.yml up -d
```
The `web` service runs `npm install` then `vite dev` on container port 5173, published on host
**3000**. Source is bind-mounted, so edits hot-reload. `node_modules` lives in the
`apex_node_modules` named volume, not the repo.

## Layout
- `apex-solutions/src/config/site.js` — all brand, navigation, service, project and team content
  (single place to rebrand or localise).
- `apex-solutions/src/styles/tokens.css` — colour/radius/motion tokens.
- `apex-solutions/src/components/` — `SiteHeader`, `HeroSection`, `HeroCityScene`, `ServiceGrid`,
  `ServiceCard`, `CharacterFeature`, `ContactPanel`, `SiteFooter`, etc.
- `apex-solutions/src/pages/` — Home, About, Services, ServiceDetail, Portfolio, ProjectDetail,
  Contact, NotFound.

## Notes / quirks
- The hero scene is real WebGL (React Three Fiber). It falls back to a CSS gradient if WebGL is
  unavailable or the canvas throws, and pauses its render loop when offscreen or the tab is hidden.
- Vite host checking is disabled (`server.allowedHosts: true`) because the sandbox preview host id
  rotates. `__VITE_ADDITIONAL_SERVER_ALLOWED_HOSTS` is also passed through.
- The contact form has **no backend**: it validates input and then reports that it is a
  demonstration. Nothing is stored or sent.
- Content is fictional/illustrative. No real contact details, social links, clients or metrics.

## Verifying
- `curl -s -o /dev/null -w "%{http_code}" http://localhost:3000/` → 200
- `docker exec app-web-1 npm run build` → production build must succeed
- Console/network check in the preview for runtime errors
