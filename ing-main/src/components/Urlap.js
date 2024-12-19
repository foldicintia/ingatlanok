import React, { useContext, useState, useEffect } from 'react';
import { ApiContext } from '../context/ApiContext';

export default function Urlap() {
    const { postAdat } = useContext(ApiContext);

    const [kategorialista, setKategorialista] = useState([]);
    const [adat, setAdat] = useState({
        kategoria: '',
        leiras: '',
        ar: '',
        kepUrl: '',
        tehermentes: true
    });


    function valtozotatasKezeles(event) {
        const sObj = { ...adat };
        sObj[event.target.id] = event.target.value;
        setAdat({...sObj});
    }

    function elkuld(event) {
        event.preventDefault();
        console.log('Elküldött adat:', adat);
        postAdat('/ingatlanok', adat);
    }

    return (
        <div>
            <form onSubmit={elkuld}>
                <div className="mb-3">
                    <label htmlFor="kategoria" className="form-label">Kategória</label>
                    <select
                        id="kategoria"
                        value={adat.kategoria}
                        onChange={valtozotatasKezeles}
                        className="form-control"
                    >
                        <option value="">Válassz kategóriát</option>
                        {kategorialista.map(kategoria => (
                            <option key={kategoria.id} value={kategoria.id}>
                                {kategoria.nev}
                            </option>
                        ))}
                    </select>
                </div>

                <div className="mb-3">
                    <label htmlFor="leiras" className="form-label">Leírás</label>
                    <textarea
                        id="leiras"
                        value={adat.leiras}
                        onChange={valtozotatasKezeles}
                        className="form-control"
                        rows="3"
                    />
                </div>

                <div className="mb-3">
                    <label htmlFor="ar" className="form-label">Ár</label>
                    <input
                        type="number"
                        id="ar"
                        value={adat.ar}
                        onChange={valtozotatasKezeles}
                        className="form-control"
                    />
                </div>

                <div className="mb-3">
                    <label htmlFor="kepUrl" className="form-label">Kép</label>
                    <input
                        type="text"
                        id="kepUrl"
                        value={adat.kepUrl}
                        onChange={valtozotatasKezeles}
                        className="form-control"
                    />
                </div>

                <div className="mb-3">
                    <label htmlFor="tehermentes" className="form-label">Tehermentes?</label>
                    <select
                        id="tehermentes"
                        value={adat.tehermentes}
                        onChange={valtozotatasKezeles}
                        className="form-control"
                    >
                        <option value={true}>Igen</option>
                        <option value={false}>Nem</option>
                    </select>
                </div>

                <button type="submit" className="btn btn-primary">Küldés</button>
            </form>
        </div>
    );
}
