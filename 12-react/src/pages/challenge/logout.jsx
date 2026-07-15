import { Button } from "@mui/material";
import { logout } from "./services/authService";
import { useNavigate } from "react-router-dom";
import { useAlert } from "../../hooks/useAlert";

function Logout() {
  const navigate = useNavigate();
  const { success, noSuccess } = useAlert();
  const handleLogin = async () => {
    try {
      await logout();
      success("Sesión cerrada correctamente");
      setTimeout(() => {
        navigate("/challenge/login");
      }, 500);
    } catch (error) {
      noSuccess(error.response.data.errors);
    }
  };
  return (
    <Button variant="contained" onClick={handleLogin}>
      Logout
    </Button>
  );
}

export default Logout;
