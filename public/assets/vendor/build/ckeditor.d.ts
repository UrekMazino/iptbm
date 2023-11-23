/**
 * @license Copyright (c) 2014-2023, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */
import {ClassicEditor} from '@ckeditor/ckeditor5-editor-classic';
// @ts-ignore
import {Alignment} from '@ckeditor/ckeditor5-alignment';
import {Bold, Italic} from '@ckeditor/ckeditor5-basic-styles';
import {Essentials} from '@ckeditor/ckeditor5-essentials';
// @ts-ignore
import {FontBackgroundColor, FontColor, FontFamily, FontSize} from '@ckeditor/ckeditor5-font';
// @ts-ignore
import {Highlight} from '@ckeditor/ckeditor5-highlight';
import {Indent} from '@ckeditor/ckeditor5-indent';
import {Link} from '@ckeditor/ckeditor5-link';
import {List, ListProperties} from '@ckeditor/ckeditor5-list';
import {Paragraph} from '@ckeditor/ckeditor5-paragraph';
import {PasteFromOffice} from '@ckeditor/ckeditor5-paste-from-office';
import {TextTransformation} from '@ckeditor/ckeditor5-typing';

declare class Editor extends ClassicEditor {
    static builtinPlugins: (typeof Alignment | typeof TextTransformation | typeof Bold | typeof Italic | typeof Essentials | typeof FontBackgroundColor | typeof FontColor | typeof FontFamily | typeof FontSize | typeof Highlight | typeof Indent | typeof Link | typeof List | typeof ListProperties | typeof Paragraph | typeof PasteFromOffice)[];
    static defaultConfig: {
        toolbar: {
            items: string[];
        };
        language: string;
    };
}

export default Editor;
