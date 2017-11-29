import { Injectable } from '@angular/core';
import GoogleUser = gapi.auth2.GoogleUser;
import { GoogleAuthService } from 'ng-gapi';
   
@Injectable()
export class UserService {
    public static SESSION_STORAGE_KEY: string = 'accessToken';
    private user: GoogleUser;
    
    constructor(private googleAuth: GoogleAuthService){ 
    }

    public getUserName(): string {
        return this.user?this.user.getBasicProfile().getName():'anonimo';
    }
    
    public getToken(): string {
        let token: string = sessionStorage.getItem(UserService.SESSION_STORAGE_KEY);
        if (!token) {
            throw new Error("no token set , authentication required");
        }
        return sessionStorage.getItem(UserService.SESSION_STORAGE_KEY);
    }
    
    public signIn(): void {
        this.googleAuth.getAuth()
            .subscribe((auth) => {
                auth.signIn().then(res => this.signInSuccessHandler(res));
            });
    }
    
    private signInSuccessHandler(res: GoogleUser) {
            this.user = res;
            console.log(this.user);
            sessionStorage.setItem(
                UserService.SESSION_STORAGE_KEY, res.getAuthResponse().access_token
            );
            localStorage.setItem('isLoggedin', 'true');
            //TODO GE: generar JWT, aumentar header, solo debe pasar si se hace el proceso de autenticacion en el servidor
            //TODO GE: verificar si el usuario existe en nuestro sistema
            //TODO GE: cargar la cuenta y los perfiles            
        }
}