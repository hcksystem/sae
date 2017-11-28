import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';

import { LoginRoutingModule } from './login-routing.module';
import { LoginComponent } from './login.component';

import { UserService } from './user.service';

@NgModule({
    imports: [
        CommonModule,
        LoginRoutingModule
    ],
    declarations: [LoginComponent],
    providers: [UserService]
})
export class LoginModule {
}
