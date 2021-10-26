import React from 'react';
//import Footer from './Footer';
import Iframe from 'react-iframe'
const ContactForm = () => {
    return (
        <div>
               
                {/** 
                <form action="" method="POST">
                    <div className="form-group">
                        <input type="name" className="form-control" id="name" placeholder="name" required/>
                    </div>
                    <div className="form-group">
                        <input type="email" className="form-control" id="email" placeholder="email" required/>
                    </div>
                    <div className="form-group">
                        <textarea className="form-control" id="exampleFormControlTextarea1" rows="10" required placeholder="Un petit mot ..."></textarea>
                    </div>
                    <div className="text-center">
                        <button type="submit" >Envoyer</button>
                    </div>
                    
                </form>
                */}
              

                <div className="contact">
                <h1><i className="fas fa-quote-left i-left"></i>&nbsp;CONTACT</h1>
                <hr />
                    <div>
                            <p>Emmanuelle Bourgeois</p>
                            <p>207 rue François Perrin, 87000 Limoges</p>
                            <p>Téléphone : </p>
                            <p>Email : </p>
                    </div>
                    <p>
                    <Iframe

                    url="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2780.2920683927437!2d1.2317299157757937!3d45.82543461728721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f94399199bb6ef%3A0xc47733c81ead4763!2sEmmanuelle%20Bourgeois%20-%20Kin%C3%A9siologue%20pour%20b%C3%A9b%C3%A9s%2C%20enfants%2C%20adultes%20et%20animaux.%20Ateliers%20massages%20b%C3%A9b%C3%A9s%20(0%20%C3%A0%201an).!5e0!3m2!1sfr!2sfr!4v1635091722422!5m2!1sfr!2sfr"
                    width="450px"
                    height="450px"
                    id="myId"
                    className="iframe-class"
                    display="initial"
                    position="relative"/>
                    </p>
                </div>
                
                
            
                
               
        </div>
    );
};

export default ContactForm;