import { BtnBack } from "../components/BtnBack";

function Example2JSX() {
  const pkName = "Bulbasaur";
  const pkType = "Grass/Poison";
  const pkLevel = 5;
  const pkAbilities = ["Overgrow", "Chlorophyll"];
  const pkImgUrl =
    "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png";
  const styles = {
    container: {
      maxWidth: "350px",
      marginTop: "2rem",
      padding: "1.5rem",
      background: "linear-gradient(135deg, #7ac74c, #4caf50)",
      color: "white",
      borderRadius: "16px",
      boxShadow: "0 4px 12px rgba(0,0,0,0.15)",
    },
    title: {
      marginBottom: "1rem",
      textAlign: "center",
    },
    img: {
      display: "block",
      width: "140px",
      height: "140px",
      margin: "0 auto 1rem",
      imageRendering: "pixelated",
    },
    ul: {
      margin: "0.5rem 0 1rem 1.2rem",
    },
  };
  return (
    <div className="container">
      <BtnBack />
      <h2>Example 2: JSX</h2>
      <p>
        Writing HTML-Like code whitin JavaScript using curly braces {} for JS
        expresions.
      </p>
      <div style={styles.container}>
        <h3 style={styles.title}>
          {pkName} (Lvl {pkLevel})
        </h3>
        <img src={pkImgUrl} alt={pkName} style={styles.img} />
        <p>Type: {pkType}</p>
        <p>Uppercase: {pkName.toUpperCase()}</p>
        <p>Abilities: </p>
        <ul style={styles.ul}>
          {pkAbilities.map((ability, index) => (
            <li key={index}>{ability}</li>
          ))}
        </ul>
        <p>Is a starter? {pkLevel === 5 ? "Yes" : "No"}</p>
      </div>
    </div>
  );
}
export default Example2JSX;
