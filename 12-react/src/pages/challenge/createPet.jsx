import { useState } from "react";
import { useNavigate } from "react-router-dom";
import {
  Box,
  Button,
  Card,
  CardContent,
  Container,
  MenuItem,
  TextField,
  Typography,
} from "@mui/material";
import { useAlert } from "../../hooks/useAlert";
import { createPet } from "./services/petService";
import { Link } from "react-router-dom";
import ArrowCircleLeftIcon from "@mui/icons-material/ArrowCircleLeft";

function CreatePet() {
  const { success, noSuccess } = useAlert();
  const navigate = useNavigate();

  const [form, setForm] = useState({
    name: "",
    status: 1,
    kind: "",
    breed: "",
    age: "",
    weight: "",
    location: "",
    description: "",
  });

  const handleChange = (e) => {
    const { name, value } = e.target;

    setForm((prev) => ({
      ...prev,
      [name]: value,
    }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const result = await createPet(form);

      success(result.message);
      setTimeout(() => {
        navigate("/challenge");
      }, 500);
    } catch (error) {
      console.error(error.response);
      noSuccess(error.response.data.errors);
    }
  };

  return (
    <Container maxWidth="sm" sx={{ mt: 5 }}>
      <Card elevation={6} sx={{ borderRadius: 3 }}>
        <Link
          to="/challenge"
          style={{
            margin: 5,
          }}
        >
          <ArrowCircleLeftIcon />
        </Link>
        <CardContent>
          <Typography
            variant="h4"
            align="center"
            fontWeight="bold"
            gutterBottom
          >
            Crear Mascota
          </Typography>

          <Box
            component="form"
            onSubmit={handleSubmit}
            sx={{
              display: "flex",
              flexDirection: "column",
              gap: 2,
            }}
          >
            <TextField
              label="Nombre"
              name="name"
              value={form.name}
              onChange={handleChange}
              fullWidth
              required
            />

            <TextField
              label="Especie"
              name="kind"
              value={form.kind}
              onChange={handleChange}
              fullWidth
              required
            />

            <TextField
              label="Raza"
              name="breed"
              value={form.breed}
              onChange={handleChange}
              fullWidth
              required
            />

            <TextField
              label="Edad"
              name="age"
              type="number"
              value={form.age}
              onChange={handleChange}
              fullWidth
              required
            />

            <TextField
              label="Peso"
              name="weight"
              type="number"
              value={form.weight}
              onChange={handleChange}
              fullWidth
              required
            />

            <TextField
              label="Ciudad"
              name="location"
              value={form.location}
              onChange={handleChange}
              fullWidth
              required
            />

            <TextField
              label="Descripción"
              name="description"
              value={form.description}
              onChange={handleChange}
              multiline
              rows={4}
              fullWidth
              required
            />

            <TextField
              label="Estado"
              name="status"
              select
              value={form.status}
              onChange={handleChange}
              fullWidth
              required
            >
              <MenuItem value={1}>Activo</MenuItem>
              <MenuItem value={0}>Inactivo</MenuItem>
            </TextField>

            <Button type="submit" variant="contained" size="large">
              Guardar cambios
            </Button>
          </Box>
        </CardContent>
      </Card>
    </Container>
  );
}

export default CreatePet;
