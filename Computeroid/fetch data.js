const [data, setData] = useState([]);
    useEffect(() => {
        fetch('http://localhost:8081/users')
            .then(res => res.json())
            .then(data => console.log(data))
            .catch(err => console.log(err));
    }, [])

<div>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        {data.map((d, i) => (
                            <tr key={i}>
                                <td>{d.id}</td>
                                <td>{d.fname} {d.lname}</td>
                                <td>{d.email}</td>
                                <td>{d.phone}</td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
