// Centralised brand + content configuration. Swap these values to rebrand the site.

export const brand = {
  name: 'Apex Solutions',
  shortName: 'Apex',
  logoMark: 'A',
  tagline: 'Innovate. Transform. Thrive.',
  intro:
    'We turn ambitious ideas into practical solutions through strategy, technology, and thoughtful design.',
  // Intentionally empty: no real contact details or social accounts are configured yet.
  // Components only render these when a value exists.
  contact: {
    email: null,
    phone: null,
    address: null,
  },
  social: [],
}

export const navigation = [
  { label: 'Home', to: '/' },
  { label: 'About', to: '/about' },
  { label: 'Services', to: '/services' },
  { label: 'Portfolio', to: '/portfolio' },
  { label: 'Contact', to: '/contact' },
]

export const primaryCta = { label: 'Get started', to: '/contact' }

export const hero = {
  headlineLines: ['Innovate.', 'Transform.', 'Thrive.'],
  copy: brand.intro,
  cta: { label: 'Explore our services', to: '/services' },
}

export const services = [
  {
    slug: 'business-strategy',
    category: 'Advisory',
    title: 'Business Strategy',
    summary:
      'Clear direction for complex decisions — positioning, priorities, and a roadmap your teams can act on.',
    illustration: 'cubes',
    scope: [
      'Market and opportunity assessment',
      'Positioning and value proposition',
      'Roadmap and prioritisation',
    ],
    deliverables: [
      'Strategy brief with clear priorities',
      'Opportunity map and trade-off analysis',
      'Quarterly execution roadmap',
    ],
    process: [
      'Discover — interviews, data review, and context gathering.',
      'Frame — define the decisions that actually matter.',
      'Chart — sequence a roadmap with measurable checkpoints.',
    ],
  },
  {
    slug: 'digital-solutions',
    category: 'Product',
    title: 'Digital Solutions',
    summary:
      'Design and build digital products that feel considered — from first sketch to a working release.',
    illustration: 'cylinders',
    light: true,
    scope: [
      'Product discovery and definition',
      'Interface and experience design',
      'Build, launch, and iterate',
    ],
    deliverables: [
      'Product concept and user flows',
      'Design system and component library',
      'Working release with handover docs',
    ],
    process: [
      'Understand — align on users, goals, and constraints.',
      'Design — prototype early and test often.',
      'Deliver — ship in small, reliable increments.',
    ],
  },
  {
    slug: 'technology-consulting',
    category: 'Technology',
    title: 'Technology Consulting',
    summary:
      'Architecture and engineering guidance that keeps platforms reliable, secure, and ready to scale.',
    illustration: 'blocks',
    scope: [
      'Architecture and platform review',
      'Integration and data strategy',
      'Reliability and security practice',
    ],
    deliverables: [
      'Architecture assessment',
      'Integration and migration plan',
      'Engineering standards and guardrails',
    ],
    process: [
      'Assess — map the current estate and its risks.',
      'Recommend — a pragmatic, staged target architecture.',
      'Embed — work alongside your team to deliver it.',
    ],
  },
  {
    slug: 'process-optimization',
    category: 'Operations',
    title: 'Process Optimization',
    summary:
      'Remove friction from the way work gets done, so teams move faster with less rework.',
    illustration: 'rings',
    scope: [
      'Process mapping and diagnostics',
      'Workflow and automation design',
      'Measurement and continuous improvement',
    ],
    deliverables: [
      'Current-state process map',
      'Optimised workflow design',
      'Metrics dashboard and review cadence',
    ],
    process: [
      'Observe — follow the work as it really happens.',
      'Simplify — remove steps that add no value.',
      'Sustain — measure, review, and keep improving.',
    ],
  },
]

// Fictional, clearly-labelled demonstration case studies — not verified client outcomes.
export const projects = [
  {
    slug: 'northwind-platform',
    title: 'Northwind Platform Refresh',
    category: 'Digital Solutions',
    isDemo: true,
    summary:
      'A demonstration project re-imagining a legacy internal platform as a modern, modular product.',
    overview:
      'Northwind is a fictional organisation used here to illustrate how we approach a platform modernisation. The work focuses on untangling a monolith into clear, well-owned modules.',
    challenge:
      'A single legacy application carried every responsibility, making changes risky and slow. Teams waited on each other for routine releases.',
    approach:
      'We mapped the domain, drew clear boundaries, and migrated capability by capability behind stable interfaces — no big-bang rewrite.',
    scope: ['Domain mapping', 'Interface design', 'Incremental migration', 'Team enablement'],
    outcomes: [
      'Smaller, independently deployable modules',
      'Clearer ownership across teams',
      'A repeatable pattern for future migration',
    ],
  },
  {
    slug: 'atlas-onboarding',
    title: 'Atlas Onboarding Experience',
    category: 'Digital Solutions',
    isDemo: true,
    summary:
      'A demonstration of a redesigned onboarding journey that reduces friction for new users.',
    overview:
      'Atlas is a fictional product concept exploring how a clearer onboarding flow changes the experience for first-time users.',
    challenge:
      'New users were asked for too much, too early, and dropped off before reaching the value of the product.',
    approach:
      'We rebuilt the journey around a single meaningful first outcome, deferring everything that was not essential.',
    scope: ['Journey research', 'Flow redesign', 'Prototype testing', 'Implementation support'],
    outcomes: [
      'A shorter path to first value',
      'Clearer expectations at each step',
      'A reusable pattern for future flows',
    ],
  },
  {
    slug: 'meridian-operations',
    title: 'Meridian Operations Review',
    category: 'Process Optimization',
    isDemo: true,
    summary:
      'A demonstration operations review that untangles a handover-heavy delivery process.',
    overview:
      'Meridian is a fictional delivery team used to illustrate a process optimisation engagement.',
    challenge:
      'Work passed through many hands with unclear ownership, creating delays and repeated rework.',
    approach:
      'We traced the real flow of work, removed non-value steps, and clarified ownership at each stage.',
    scope: ['Process mapping', 'Bottleneck analysis', 'Workflow redesign', 'Measurement setup'],
    outcomes: [
      'Fewer handovers and clearer ownership',
      'A simpler, more predictable flow',
      'Metrics to keep the process honest',
    ],
  },
  {
    slug: 'harbor-architecture',
    title: 'Harbor Architecture Assessment',
    category: 'Technology Consulting',
    isDemo: true,
    summary:
      'A demonstration architecture assessment producing a pragmatic, staged modernisation plan.',
    overview:
      'Harbor is a fictional platform used to show how we assess an estate and sequence improvements.',
    challenge:
      'Growing integration complexity made the platform harder to change and harder to reason about.',
    approach:
      'We assessed the architecture against real business drivers and recommended a staged, low-risk path forward.',
    scope: ['Architecture review', 'Risk assessment', 'Target-state design', 'Migration planning'],
    outcomes: [
      'A clear picture of current-state risk',
      'A staged, low-risk target architecture',
      'A plan the team could start immediately',
    ],
  },
]

// Fictional demonstration profiles — not verified employees.
export const team = [
  {
    name: 'Daniel Reyes',
    role: 'Strategy Lead',
    variant: 'glasses',
    blurb:
      'Frames the decisions that matter, then keeps the plan honest as reality changes.',
  },
  {
    name: 'Marcus Bell',
    role: 'Delivery Lead',
    variant: 'tie',
    blurb:
      'Turns direction into working software through small, reliable increments.',
  },
  {
    name: 'Elena Novak',
    role: 'Design Lead',
    variant: 'glasses-f',
    blurb:
      'Shapes experiences that feel considered, calm, and genuinely useful.',
  },
]

export const brandStatement =
  'We believe good work is equal parts ambition and discipline — bold enough to matter, structured enough to ship.'
