import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
function App(props) {
    const {user, csrf, datenow, exists} = props
    const [count, setCount] = useState(0)

    let parsedExists = JSON.parse(exists)

    useEffect(() => {
        if(parsedExists) {
            setCount(parsedExists.click_counts)
        } else {
            setCount(0)
        }
    },[])

    const countClicks = (e) => {
        e.preventDefault()
        setCount(prevCount => prevCount + 1)

        fetch('/sendrequest', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf
            },
            body: JSON.stringify({counts: count + 1}),
        }).then(response => response.json())
        .then(data => {
          console.log('Success:', data);
      })
        .catch((error) => {
          console.error('Error:', error);
      });
    }
    
return (
    <div className="container">
        <div className="row justify-content-center">
            <div className="col-md-8">
                <div className="card">
                    <div className="card-header">Dashboard</div>

                    <div className="card-body text-center">
                       <form className="p-5" onSubmit={countClicks}>
                           <button className={`btn-clickme btn btn-outline-success form-control`}>Click Me!</button>
                       </form>
                       <h4>Click Count: {count}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
        )
}

export default App;

if (document.getElementById('root')) {
    const element = document.getElementById('root')
    const props = Object.assign({}, element.dataset)

    ReactDOM.render(<App {...props} />, element);
}
// date_clicked: "2022-03-11"
// 2022-03-11T19:57:15.901962Z