import React from 'react';
import { Link, animateScroll as scroll } from "react-scroll";

const Navigation = () => {

    
    return (

        <nav className="navbar navbar-expand-lg navbar-dark " id="navbar">  
            <div className="container-fluid" >
                <div className="navbar-brand" href="#"><p>Emmanuelle.B - Kinésiologue</p></div>
                <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span className="navbar-toggler-icon"></span>
                </button>
                <div className="collapse navbar-collapse flex-row-reverse" id="navbarNavDropdown" >
                <ul className="navbar-nav" id='myMenu'>
                    <li className="nav-item">
                    <Link
                        activeClass="active"
                        to="section1"
                        spy={true}
                        smooth={true}
                        offset={-70}
                        duration={500}
                    >
                        Section 1
                    </Link>
                    {/* <a href="#home" className="nav-link hover link active" data-menuanchor="home" >Accueil</a>*/}
                    </li>
                    <li className="nav-item">
                    <Link
                        activeClass="active"
                        to="section2"
                        spy={true}
                        smooth={true}
                        offset={-70}
                        duration={500}
                    >
                        Section 2
                    </Link>
                         {/*<a href="#course" className="nav-link hover link" data-menuanchor="course">Mon Parcours</a>*/}
                    </li>
                    <li className="nav-item dropdown">
                        <a href="#test" data-menuanchor="kine" className="nav-link dropdown-toggle hover link" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">La kinésiologie</a>
                        <ul className="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a  href="#kine" className="dropdown-item hover menu-link">Pour qui ? Pour quoi ?</a></li>
                            <li><a  href="#kine/1" className="dropdown-item hover menu-link">Humaine</a></li>
                            <li><a  href="#kine/2" className="dropdown-item hover menu-link" >Animal</a></li>
                        </ul>
                    </li>
                    <li className="nav-item">
                        <a href="#kine-baby" className="nav-link hover link" data-menuanchor="kine-baby">L'Atelier massages bébés</a>
                    </li>
                    <li className="nav-item">
                    <a href="#contact" className="nav-link hover link" data-menuanchor="contact">Contact</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    );
};

export default Navigation;
