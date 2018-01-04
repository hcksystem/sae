import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';
import { NgbDropdownModule } from '@ng-bootstrap/ng-bootstrap';
import { TranslateModule } from '@ngx-translate/core';

import { LayoutRoutingModule } from './layout-routing.module';
import { LayoutComponent } from './layout.component';
import { HeaderComponent, SidebarComponent } from '../shared';
import { FroalaEditorModule, FroalaViewModule } from 'angular-froala-wysiwyg';

@NgModule({
    imports: [
        CommonModule,
        FormsModule,
        NgbDropdownModule.forRoot(),
        LayoutRoutingModule,
        TranslateModule,
        FroalaEditorModule,
        FroalaViewModule
    ],
    declarations: [
        LayoutComponent,
        HeaderComponent,
        SidebarComponent,
    ],
    providers: []
})
export class LayoutModule { }
