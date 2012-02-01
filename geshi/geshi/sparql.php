<?php
/*************************************************************************************
 * sparql.php
 * -------
 * Author: Alex Stolz (alex.stolz@ebusiness-unibw.org), Christian Fürber (christian@fuerber.com)
 * Copyright: (c) 2012 E-Business and Web Science Research Group (http://www.unibw.de/ebusiness/)
 * Date Started: 2012/01/31
 * Release Version: 1.1.0
 *
 * SPARQL language file for GeSHi.
 *
 * TODO
 * -------------------------
 * * recognize ; correctly
 *
 *************************************************************************************
 *
 *     This file is part of GeSHi.
 *
 *   GeSHi is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   GeSHi is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with GeSHi; if not, write to the Free Software
 *   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 ************************************************************************************/

$REGEXP_ENDDELIMITER = "(<SEMI>|[\],}\.]\s)";
$REGEXP_VAR = "\?\w+";
$REGEXP_URIREF = "&lt;[^\s]*&gt;";
$REGEXP_CURIE = "\w+:\w+";
$REGEXP_LITERAL = "(&quot;(?:(?!&quot;).)*&quot;|'[^']*'|[0-9]+(\.[0-9]+)?)(\^\^($REGEXP_URIREF|$REGEXP_CURIE)|\@\w+)?";
$REGEXP_SUBJECT = "$REGEXP_VAR\s+|$REGEXP_CURIE\s+|$REGEXP_URIREF\s+";
$REGEXP_PREDICATE = "$REGEXP_VAR\s+|$REGEXP_CURIE\s+|$REGEXP_URIREF\s+|a\s+";
$REGEXP_OBJECT = "[\[]|($REGEXP_VAR|$REGEXP_CURIE|$REGEXP_URIREF|$REGEXP_LITERAL)\s*$REGEXP_ENDDELIMITER";

$language_data = array (
    'LANG_NAME' => 'SPARQL',
    'COMMENT_SINGLE' => array(1 =>'# '),
    'COMMENT_MULTI' => array('/*' => '*/'),
    'CASE_KEYWORDS' => GESHI_CAPS_NO_CHANGE,
    'QUOTEMARKS' => array(),//"'", '"', '`'),
    'ESCAPE_CHAR' => '\\',
    'KEYWORDS' => array(
        1 => array(
        '@prefix',
        'AS','ASC','ASK','BIND','BINDINGS','CONSTRUCT','COUNT','DESC','DESCRIBE','DISTINCT',
        'EXISTS','FILTER','FROM','GRAPH','GROUP BY','HAVING','IF','IN','INSERT','LIMIT',
        'MINUS','MODIFY','NAMED','NOT EXISTS','NOT IN','OFFSET','OPTIONAL','ORDER BY',
        'PREFIX','REDUCED','SELECT','SERVICE','UNION','WHERE'
        ),
        2 => array(
        'abs','BNODE','bound','ceil','CONCAT','CONTAINS','datatype','day','ENCODE_FOR_URI',
        'floor','hours','IRI','isBlank','isIRI','isLiteral','isNumeric','lang','langMatches',
        'LCASE','MD5','minutes','month','now','rand','regex','round','sameTerm','seconds','SHA1',
        'SHA224','SHA256','SHA384','SHA512','str','STRDT','STRENDS','STRLANG','STRLEN','STRSTARTS',
        'SUBSTR','timezone','tz','UCASE','URI','year'
        ),
        /*3 => array(
        'a', 'rdf:type'
        )*/
    ),
    'METHODS' => array(),
    'REGEXPS' => array(
        // subjects
        10 => array(
            GESHI_SEARCH => "($REGEXP_SUBJECT)($REGEXP_PREDICATE)($REGEXP_OBJECT)", 
            GESHI_REPLACE => '\\1',
            GESHI_MODIFIERS => 'si',
            GESHI_BEFORE => '',
            GESHI_AFTER => '\\2\\3'
            ),
        // predicates
        11 => array(
            GESHI_SEARCH => "($REGEXP_PREDICATE)($REGEXP_OBJECT)", 
            GESHI_REPLACE => '\\1',
            GESHI_MODIFIERS => 'si',
            GESHI_BEFORE => '',
            GESHI_AFTER => '\\2'
            ),
        // objects
        6 => array(
            GESHI_SEARCH => "($REGEXP_OBJECT)", 
            GESHI_REPLACE => '\\1',
            GESHI_MODIFIERS => 'si',
            GESHI_BEFORE => '',
            GESHI_AFTER => ''
            ),
        // uris
        12 => array(
            GESHI_SEARCH => "($REGEXP_URIREF)", 
            GESHI_REPLACE => '\\1',
            GESHI_MODIFIERS => 'si',
            GESHI_BEFORE => '',
            GESHI_AFTER => ''
            ),
         1 => 'xsd:\w+',
         4 => 'bif:\w+',
         5 => "(&quot;(?:(?!&quot;).)*&quot;|'[^']*')", // string literals
         //8 => $REGEXP_VAR, // highlight variables with custom color
     
    ),
    'SYMBOLS' => array(
        0 => array(
            '(', ')', '=', '|', ',', '+', '*', '!','&&', '||','{','}', '[', ']'
        )
    ),
    'CASE_SENSITIVE' => array(
        GESHI_COMMENTS => false,
        1 => false,
        2 => true,
        3 => true
    ),
    'STYLES' => array(
        'KEYWORDS' => array(
            1 => 'color: #000099; font-weight: bold;',
            2 => 'color: #000099; font-weight: bold;',
            3 => 'color: #226699; font-weight: bold;'
        ),
        'COMMENTS' => array(
            1 => 'color: #808080; font-style: italic;',
            //2 => 'color: #808080; font-style: italic;',
            'MULTI' => 'color: #808080; font-style: italic;'
        ),
        'ESCAPE_CHAR' => array(
            0 => 'color: #000099; font-weight: bold;'
        ),
        'BRACKETS' => array(
            0 => 'color: #000000;'
        ),
        'STRINGS' => array(
            0 => 'color: #ff0000;'
        ),
        'NUMBERS' => array(),
        'METHODS' => array(),
        'SYMBOLS' => array(
            0 => 'color: #000000; font-weight: bold;'
        ),
        'SCRIPT' => array(),
        'REGEXPS' => array(
            0 => 'color: #000000; font-weight: bold;',
            1 => 'color: #000000; font-weight: bold;',
            2 => 'color: #000000; font-weight: bold;',
            3 => 'color: #000000; font-weight: bold;',
            4 => 'color: #000000; font-weight: bold;',
            5 => 'color: red; font-weight: bold;',
            6 => 'color: #6699FF; font-weight: bold;',
            7 => 'color: #996633; font-weight: bold;',
            8 => 'color: #004400; font-weight: bold;',
            9 => 'color: orange; font-weight: bold;',
            10 => 'color: blue; font-weight: bold;',
            11 => 'color: green; font-weight: bold;',
            12 => 'color: #990000; font-weight: bold;'
        )
    ),
    'URLS' => array(
        1 => '',
        2 => '',
        3 => ''
    ),
    'OOLANG' => true,
    'OBJECT_SPLITTERS' => array(),
    'STRICT_MODE_APPLIES' => GESHI_NEVER,
    'SCRIPT_DELIMITERS' => array(),
    'HIGHLIGHT_STRICT_BLOCK' => array()
);

?>