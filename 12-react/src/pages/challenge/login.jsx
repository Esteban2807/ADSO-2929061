import { login } from "./services/authService";
import { useState } from "react";
import { useNavigate } from "react-router-dom";
import {
  Avatar,
  Box,
  Button,
  Container,
  Paper,
  TextField,
  Typography,
} from "@mui/material";
import LockOutlinedIcon from "@mui/icons-material/LockOutlined";
import { useAlert } from "../../hooks/useAlert";

function Login() {
  const navigate = useNavigate();

  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const { success, noSuccess } = useAlert();
  const handleLogin = async () => {
    try {
      const result = await login({
        email,
        password,
      });
      success(result.data.message);
      setTimeout(() => {
        navigate("/challenge");
      }, 500);
    } catch (error) {
      if (error.response.status === 400) {
        noSuccess("Credenciales inválidas");
      } else {
        noSuccess("Error al iniciar sesión");
      }
    }
  };
  return (
    <Container maxWidth="xs">
      <Paper
        elevation={8}
        sx={{
          mt: 10,
          p: 4,
          borderRadius: 3,
          textAlign: "center",
        }}
      >
        <Avatar
          sx={{
            bgcolor: "primary.main",
            mx: "auto",
            mb: 2,
            width: 56,
            height: 56,
          }}
        >
          <LockOutlinedIcon />
        </Avatar>

        <Typography variant="h4" fontWeight="bold" gutterBottom>
          Iniciar sesión
        </Typography>

        <Typography variant="body2" color="text.secondary" sx={{ mb: 3 }}>
          Ingresa tus credenciales para continuar
        </Typography>

        <Box
          component="form"
          onSubmit={(e) => {
            e.preventDefault();
            handleLogin();
          }}
        >
          <TextField
            fullWidth
            margin="normal"
            label="Correo electrónico"
            type="email"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
          />

          <TextField
            fullWidth
            margin="normal"
            label="Contraseña"
            type="password"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
          />

          <Button
            type="submit"
            fullWidth
            variant="contained"
            size="large"
            sx={{
              mt: 3,
              py: 1.5,
              borderRadius: 2,
              textTransform: "none",
              fontSize: 16,
            }}
          >
            Iniciar sesión
          </Button>
        </Box>
      </Paper>
    </Container>
  );
}

export default Login;
