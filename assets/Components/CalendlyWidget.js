import React from 'react';
import { PopupWidget } from 'react-calendly';

const CalendlyWidget = () => {
    return (
        <PopupWidget
            brandingcolor="#50a696"
            pageSettings={{
                backgroundColor: 'ffffff',
                hideEventTypeDetails: true,
                hideGdprBanner: true,
                hideLandingPageDetails: false,
                primaryColor: '00a2ff',
                textColor: '4d5055'
            }}
            
            text="Prendre rendez-vous !"
            textColor="#ffffff"
            url="https://calendly.com/veking?primary_color=dd8214"
            
        />
    );
};

export default CalendlyWidget;