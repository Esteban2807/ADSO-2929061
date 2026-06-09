import { BtnBack } from "../components/BtnBack";
import { CardPokemon } from "../components/CardPokemon";
function Example3Props() {
  const styles = {
    cards: {
      display: "flex",
      gap: "1.5rem",
      flexWrap: "wrap",
      marginTop: "2rem",
      justifyContent: "center",
    },

    card: {
      width: "250px",
      padding: "1.5rem",
      borderRadius: "16px",
      backgroundColor: "#ffffff",
      boxShadow: "0 4px 12px rgba(0,0,0,0.1)",
      textAlign: "center",
      transition: "transform 0.2s ease",
    },

    legendaryCard: {
      width: "250px",
      padding: "1.5rem",
      borderRadius: "16px",
      background: "linear-gradient(135deg, #ffd700, #ffb300)",
      color: "#222",
      boxShadow: "0 4px 12px rgba(0,0,0,0.15)",
      textAlign: "center",
    },

    image: {
      width: "120px",
      height: "120px",
      objectFit: "contain",
      marginBottom: "1rem",
    },

    title: {
      marginBottom: "0.5rem",
    },

    type: {
      color: "#666",
      marginBottom: "0.5rem",
    },

    power: {
      fontWeight: "bold",
      color: "#2563eb",
      marginBottom: "0.75rem",
    },

    badge: {
      display: "inline-block",
      padding: "0.3rem 0.8rem",
      borderRadius: "999px",
      backgroundColor: "#ff5722",
      color: "white",
      fontSize: "0.8rem",
      fontWeight: "bold",
    },
  };
  const pokemons = [
    {
      id: 1,
      name: "Pikachu",
      type: "Electric",
      power: "Thunderbolt",
      image:
        "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/25.png",
      legendary: false,
    },
    {
      id: 2,
      name: "Mewtwo",
      type: "Psychic",
      power: "Psychic",
      image:
        "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/150.png",
      legendary: true,
    },
    {
      id: 3,
      name: "Gyarados",
      type: "Water",
      power: "Hydro Pump",
      image:
        "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/130.png",
      legendary: false,
    },
  ];
  return (
    <div className="container">
      <BtnBack />
      <h2>Example 3: Props</h2>
      <p>Pass data from parent to children (like function arguments)</p>
      <div style={styles.cards}>
        {pokemons.map((pk) => (
          <CardPokemon
            key={pk.id}
            name={pk.name}
            type={pk.type}
            power={pk.power}
            image={pk.image}
            legendary={pk.legendary}
          />
        ))}
      </div>
    </div>
  );
}

export default Example3Props;
