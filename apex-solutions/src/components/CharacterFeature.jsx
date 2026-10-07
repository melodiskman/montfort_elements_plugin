import CharacterPortrait from './CharacterPortrait.jsx'

export default function CharacterFeature({ person }) {
  return (
    <article className="character">
      <div className="character__portrait">
        <CharacterPortrait variant={person.variant} name={person.name} />
      </div>
      <div>
        <h3 className="character__name">{person.name}</h3>
        <p className="character__role">{person.role}</p>
        <p className="character__blurb">{person.blurb}</p>
      </div>
    </article>
  )
}
