import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom'; 
import Ingatlanok from './components/Ingatlanok'; 
import Ingatlan from './components/Ingatlan';  

function App() {
  return (
      <Router>
        <Routes>
          <Route path="/" element={<Ingatlanok />} />
          <Route path="/ingatlan/:id" element={<Ingatlan />} />
        </Routes>
      </Router>

  );
}

export default App;

