import React from 'react';



function Ingatlan(props) {
  return (
        <tr>
          <td>{props.kategoria}</td>
          <td>{props.leiras}</td>
          <td>{props.hirdetesDatum}</td>
          <td>{props.tehermentes}</td>
          <td>{props.ar}</td>
          <td>{props.kepUrl}</td>
        </tr>
  );
}

export default Ingatlan;