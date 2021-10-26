import React, { Component } from "react";
//import logo from "./logo.svg";
import "./App.scss";
import Navbar from "./Components/Navbar";
import Section from "./Components/Section";
import Footer from "./Components/Footer";
//import dummyText from "./DummyText";
import CalendlyWidget from './components/CalendlyWidget';

import axios from 'axios';


class App extends Component {
  constructor() {
      super();
      this.state = { categories: [], loading: true};
  }

  componentDidMount() {
      this.getCategories();
  }

  //Récuperation des données contents
  getCategories() {
    axios.get(`http://localhost:8000/api/categories`).then(categories => {
        this.setState({ categories: categories.data, loading: false})
    })
  }


  

  render() {
    
    const loading = this.state.loading;
    console.log(this.state.categories.title);
    return (
      <div className="App">
      {/** NAVBAR  */}
         <Navbar />
      {/** WIDGET CALENDLY  */}
      <CalendlyWidget/>
      {loading ? (
            <div className={'row text-center'}>
                <span className="fa fa-spin fa-spinner fa-4x"></span>
            </div>
        ) : (
          <div>
           
          { this.state.categories.map(category =>
            
             <Section title={category.Description_title} id={category.id} idCat={category.title}/>
            
          )}
           <Section title='contact' id='contact'/>
        </div>
      )}
      
     
     {/** <Footer />
      */}
      </div>
    );
  }
}

export default App;
