import { useState } from "react";
import { BtnBack } from "../components/BtnBack";

function Example6ConditionalList() {
  const [pcBox, setPcBox] = useState([
    { id: 1, name: "Pidgey", level: 3, type: "Normal/Flying" },
    { id: 2, name: "Rattata", level: 2, type: "Normal" },
    { id: 3, name: "Zubat", level: 4, type: "Poison/Flying" },
    { id: 4, name: "Geodude", level: 5, type: "Rock/Ground" },
  ]);

  const [typeFilter, setTypeFilter] = useState("all");
  const [showOnlyHighLevel, setShowOnlyHighLevel] = useState(false);

  const releasePokemon = (id) => {
    setPcBox(pcBox.filter((pokemon) => pokemon.id !== id));
  };

  const addPokemon = () => {
    const newPokemon = [
      { id: Date.now(), name: "Caterpie", level: 2, type: "Bug" },
      { id: Date.now() + 1, name: "Weedle", level: 2, type: "Bug/Poison" },
      {
        id: Date.now() + 2,
        name: "Pidgeotto",
        level: 8,
        type: "Normal/Flying",
      },
    ];

    const random =
      newPokemon[Math.floor(Math.random() * newPokemon.length)];

    setPcBox([...pcBox, { ...random, id: Date.now() }]);
  };

  const filteredPokemon = pcBox.filter((pokemon) => {
    if (
      typeFilter !== "all" &&
      !pokemon.type.toLowerCase().includes(typeFilter)
    ) {
      return false;
    }

    if (showOnlyHighLevel && pokemon.level < 4) {
      return false;
    }

    return true;
  });

  return (
    <div className="container">
      <BtnBack />

      <h2>Example 6: Conditional Rendering</h2>
      <p>Show or hide UI elements based on state</p>

      <div style={filtersContainer}>
        <h3>Filters:</h3>

        <div style={filtersRow}>
          <select
            value={typeFilter}
            onChange={(e) => setTypeFilter(e.target.value)}
            style={selectStyle}
          >
            <option value="all">All types</option>
            <option value="normal">Normal</option>
            <option value="flying">Flying</option>
            <option value="poison">Poison</option>
            <option value="bug">Bug</option>
          </select>

          <label>
            <input
              type="checkbox"
              checked={showOnlyHighLevel}
              onChange={(e) => setShowOnlyHighLevel(e.target.checked)}
              style={checkboxStyle}
            />
            &nbsp; Show Only level 4+
          </label>

          <button onClick={addPokemon} style={buttonStyle}>
            Random Pokemon
          </button>
        </div>
      </div>

      {filteredPokemon.length === 0 ? (
        <div style={emptyBoxStyle}>
          <h3>The box is empty</h3>
          <p>No Pokemon match the selected filters</p>
        </div>
      ) : (
        <div>
          <p>
            <strong>
              Showing {filteredPokemon.length} of {pcBox.length} Pokémon
            </strong>
          </p>

          <div style={pokemonGrid}>
            {filteredPokemon.map((pokemon) => (
              <div key={pokemon.id} style={pokemonCard}>
                <h4>{pokemon.name}</h4>
                <p>Level: {pokemon.level}</p>
                <p>Type: {pokemon.type}</p>

                <button
                  onClick={() => releasePokemon(pokemon.id)}
                  style={releaseButton}
                >
                  Release
                </button>
              </div>
            ))}
          </div>
        </div>
      )}
    </div>
  );
}

const filtersContainer = {
  marginBottom: "20px",
};

const filtersRow = {
  display: "flex",
  gap: "20px",
  flexWrap: "wrap",
  alignItems: "center",
};

const selectStyle = {
  padding: "8px",
  borderRadius: "8px",
  border: "1px solid #ccc",
};

const checkboxStyle = {
  accentColor: "#72c7ee",
};

const buttonStyle = {
  padding: "8px 16px",
  backgroundColor: "#72c7ee",
  color: "#fff",
  border: "none",
  borderRadius: "8px",
  cursor: "pointer",
  fontWeight: "bold",
};

const pokemonGrid = {
  display: "flex",
  flexWrap: "wrap",
  gap: "10px",
};

const pokemonCard = {
  border: "1px solid #ddd",
  borderRadius: "10px",
  padding: "15px",
  minWidth: "180px",
  backgroundColor: "#f8f9fa",
  boxShadow: "0 2px 5px rgba(0,0,0,0.1)",
};

const releaseButton = {
  backgroundColor: "#ff6b6b",
  color: "#fff",
  border: "none",
  borderRadius: "6px",
  padding: "8px 12px",
  cursor: "pointer",
};

const emptyBoxStyle = {
  textAlign: "center",
  padding: "20px",
  border: "2px dashed #ccc",
  borderRadius: "10px",
  backgroundColor: "#fafafa",
};

export default Example6ConditionalList;