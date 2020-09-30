/* eslint-disable no-unused-vars, no-unused-expressions */
var DIALOGUE_PREFIX,
    BASE,
    CONFIRMYES,
    CONFIRMNO,
    TITLE,
    QUESTION,
    CSS_CLASSES;

DIALOGUE_PREFIX = 'eset-dialogue';
BASE = 'notificationBase';
CONFIRMYES = 'yesLabel';
CONFIRMNO = 'noLabel';
TITLE = 'title';
QUESTION = 'question';
CSS_CLASSES = {
    BASE: 'eset-dialogue-base',
    WRAP: 'eset-dialogue-wrap',
    HEADER: 'eset-dialogue-hd',
    BODY: 'eset-dialogue-bd',
    CONTENT: 'eset-dialogue-content',
    FOOTER: 'eset-dialogue-ft',
    HIDDEN: 'hidden',
    LIGHTBOX: 'eset-dialogue-lightbox'
};

// Set up the namespace once.
M.core = M.core || {};
