import api from "./api";

export const getPets = async () => {
  const response = await api.get("/pets/list");
  return response.data;
};

export const getPet = async (id) => {
  const response = await api.get(`/pets/show/${id}`);
  return response.data;
};

export const createPet = async (data) => {
  const response = await api.post("/pets/store", data);
  return response.data;
};

export const updatePet = async (id, data) => {
  const response = await api.put(`/pets/edit/${id}`, data);
  return response.data;
};

export const deletePet = async (id) => {
  const response = await api.delete(`/pets/delete/${id}`);
  return response.data;
};
