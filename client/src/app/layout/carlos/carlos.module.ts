import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { CarlosRoutingModule } from './carlos-routing.module';
import { CarlosComponent } from './carlos.component';
import { CarlosService } from './carlos.service';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    CarlosRoutingModule
  ],
  declarations: [CarlosComponent],
  providers: [CarlosService]
})
export class CarlosModule { }
