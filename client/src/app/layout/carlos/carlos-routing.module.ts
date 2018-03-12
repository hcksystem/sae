import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { CarlosComponent } from './carlos.component';

const routes: Routes = [
    { path: '', component: CarlosComponent }
];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class CarlosRoutingModule { }
