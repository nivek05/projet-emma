import React from 'react';
import { Async } from "react-async";
//import Loader from './Loader';
export default function Contents({id}) {

    const fetchContent = async ({id}) => {
        const response = await fetch(`http://127.0.0.1:8000/api/content/${id}`)
        
       
        if (!response.ok) throw new Error(response.statusText)
       
        return response.json()
    
    }
  
    function createMarkup() {
        return {   }; 
      }

   
        
    return(
        <div>
            
            <Async promiseFn={fetchContent} id={id}>
                    <Async.Pending>  
                        <div >Loader....</div>
                    </Async.Pending>
                    <Async.Rejected>Error !!!!</Async.Rejected>
                    <Async.Fulfilled>{
                      
                    data => {
                        //initialisation content 
                        let content = data[0].description;
                        // si plus de 1 contenu -> affichage des contenus
                        if(data.length > 1){
                            /*
                            for(let i =0; i<=data.length; i++){
                                let contentsDesc = data[i].description;
                                console.log(data.length);
                                console.log(data[1].description);
                                return (
                                    <div dangerouslySetInnerHTML={{ __html: contentsDesc }}></div>
                                    );
                            }
                            */
                            return (
                                <p>Affichage des contenus lien kinesiologie</p>
                                );
                            
                        }
                        //sinon on retourne le content
                        else{
                       
                            return (
                                <p dangerouslySetInnerHTML={{ __html: content }}></p>
                                    
                                
                            );
                        }
                    }

                    
                    }</Async.Fulfilled>
                </Async>
        
        </div>
    )
   
}
