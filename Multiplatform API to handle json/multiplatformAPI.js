const express = require('express');
const app = express();
app.use(express.json());

app.get('/api/greeting', (req, res) => {
  res.json({ message: 'Hello from your API!' });
});

app.post('/api/greeting', (req, res) => {
  const { name } = req.body;
  res.json({
    message: `Hello, ${name || 'Guest'}! This greeting was created via POST.`
  });
});

app.put('/api/user/:id', (req, res) => {
  const userId = req.params.id;
  const updates = req.body;
  res.json({
    userId,
    updatedWith: updates,
    message: `User ${userId} has been updated via PUT.`
  });
});

app.delete('/api/user/:id', (req, res) => {
  const userId = req.params.id;
  res.json({
    userId,
    message: `User ${userId} has been deleted via DELETE.`
  });
});

app.patch('/api/user/:id', (req, res) => {
  const userId = req.params.id;
  const partial = req.body;
  res.json({
    userId,
    patchedWith: partial,
    message: `User ${userId} has been partially updated via PATCH.`
  });
});

app.listen(3000, () => {
  console.log('API server running on port 3000');
});