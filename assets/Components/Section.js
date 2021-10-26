import React from "react";
import ContactForm from "./ContactForm";
import Contents from "./Contents";

export default function Section({ title, id, idCat }) {

  
  if(title === "Accueil"){
    return(
      
        <div className="section" id={idCat}>
           <img src='upload/images/616696f60df6d911763265.jpg' alt="img-home" className="imageHome"/>
          <div className="section-content-home">
            <img src='/assets/logo.png' alt="logo" className="logo-img"/>
            <Contents id={id}/>
          </div>
        </div>
    );
  }else{

    if(title === "contact"){
      return (
    
        <div className="section" id='contact'>
            <div className="section-content contact">
                <ContactForm />
            </div>
        </div>
      );
    }
    else{
      return (
        
        <div className="section" id={idCat}>
          <div className="section-content">
          <h1><i className="fas fa-quote-left i-left"></i>&nbsp;{title}</h1>
                <hr />
                <Contents id={id}/>
              {/**
            <p dangerouslySetInnerHTML={createMarkup()}></p>
            */}
          </div>
        </div>
      );
    }  
  }
}
