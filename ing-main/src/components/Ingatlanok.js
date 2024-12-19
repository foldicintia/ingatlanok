import React, { useState, useEffect } from 'react';
import Ingatlan from './Ingatlan';

function Ingatlanok() {
  const [ingatlanok, setIngatlanok] = useState([]);

  useEffect(() => {
    fetch('api/ingatlanok')
      .then(response => response.json())
      .then(data => setIngatlanok(data))
      .catch(error => console.error('Hiba történt:', error));
  }, []);

  return (
    <div>
      <h1>Ajánlataink</h1>
      <table>
        <thead>
          <tr>
            <th>Kategória</th>
            <th>Leírás</th>
            <th>Hirdetés Dátuma</th>
            <th>Tehermentes</th>
            <th>Ár</th>
            <th>Kép</th>
          </tr>
        </thead>
        <tbody>
          {ingatlanok.map(ingatlan => (
            <Ingatlan
              key={ingatlan.id}
              kategoria={ingatlan.kategoria}
              leiras={ingatlan.leiras}
              hirdetesDatum={ingatlan.hirdetesDatum}
              tehermentes={ingatlan.tehermentes ? 'Igen' : 'Nem'}
              ar={ingatlan.ar}
              kepUrl={ingatlan.kepUrl}
            />
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default Ingatlanok;
