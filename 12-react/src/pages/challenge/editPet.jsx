import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import { getPet, updatePet } from "./services/petService";

import {
  Avatar,
  Box,
  Card,
  CardContent,
  Container,
  Typography,
  TextField,
  MenuItem,
  Button,
} from "@mui/material";
import { Link, useNavigate } from "react-router-dom";
import ArrowCircleLeftIcon from "@mui/icons-material/ArrowCircleLeft";
import { useAlert } from "../../hooks/useAlert";

function EditPet() {
  const { id } = useParams();
  const navigate = useNavigate();
  const { success, noSuccess } = useAlert();

  const [form, setForm] = useState({
    name: "",
    status: 0,
    kind: "",
    breed: "",
    age: 0,
    weight: 0,
    location: "",
    description: "",
    created_at: new Date(NaN),
  });

  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const loadPet = async () => {
      try {
        const data = await getPet(id);
        setForm(data.pet);
      } catch (error) {
        console.error(error);
      } finally {
        setLoading(false);
      }
    };

    loadPet();
  }, [id]);

  if (loading) {
    return (
      <Container sx={{ mt: 5 }}>
        <Typography>Cargando...</Typography>
      </Container>
    );
  }

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
      const result = await updatePet(id, form);
      success(result.message);
      setTimeout(() => {
        navigate("/challenge");
      }, 500);
    } catch (error) {
      noSuccess(error.response.data.errors);
    }
  };

  if (!form) {
    return (
      <Container sx={{ mt: 5 }}>
        <Typography>Cargando información...</Typography>
      </Container>
    );
  }

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
            Editar Mascota
          </Typography>

          <Box
            sx={{
              display: "flex",
              justifyContent: "center",
              mb: 3,
            }}
          >
            <Avatar
              src={`http://localhost:8000/${form.image}`}
              sx={{
                width: 160,
                height: 160,
                border: "4px solid",
                borderColor: "primary.main",
              }}
            />
          </Box>

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
              required
              fullWidth
            />

            <TextField
              label="Especie"
              name="kind"
              value={form.kind}
              onChange={handleChange}
              required
              fullWidth
            />

            <TextField
              label="Raza"
              name="breed"
              value={form.breed}
              onChange={handleChange}
              required
              fullWidth
            />

            <TextField
              label="Edad"
              name="age"
              type="number"
              value={form.age}
              onChange={handleChange}
              required
              fullWidth
            />

            <TextField
              label="Peso"
              name="weight"
              type="number"
              value={form.weight}
              onChange={handleChange}
              required
              fullWidth
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

export default EditPet;
