<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Address extends CI_Controller {
    public $xml = '<?xml version="1.0" encoding="UTF-8"?>
<ymaps xmlns="http://maps.yandex.ru/ymaps/1.x" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.opengis.net/gml http://schemas.opengis.net/gml/3.1.1/base/gml.xsd http://maps.yandex.ru/ymaps/1.x https://maps.yandex.ru/schemas/ymaps/1.x/ymaps.xsd http://maps.yandex.ru/geocoder/1.x http://maps.yandex.ru/schemas/geocoder/1.x/geocoder.xsd http://maps.yandex.ru/address/1.x http://maps.yandex.ru/schemas/search/1.x/address.xsd urn:oasis:names:tc:ciq:xsdschema:xAL:2.0 http://docs.oasis-open.org/election/external/xAL.xsd">
    <GeoObjectCollection>
        <metaDataProperty xmlns="http://www.opengis.net/gml">
            <GeocoderResponseMetaData xmlns="http://maps.yandex.ru/geocoder/1.x">
                <request>Маргелова 9а
 </request>
                <found>10</found>
                <results>10</results>
            </GeocoderResponseMetaData>
        </metaDataProperty>
        <featureMember xmlns="http://www.opengis.net/gml">
            <GeoObject xmlns="http://maps.yandex.ru/ymaps/1.x" xmlns:gml="http://www.opengis.net/gml" gml:id="1">
                <metaDataProperty xmlns="http://www.opengis.net/gml">
                    <GeocoderMetaData xmlns="http://maps.yandex.ru/geocoder/1.x">
                        <kind>house</kind>
                        <text>Россия, Псков, улица Генерала Маргелова, 9А</text>
                        <precision>exact</precision>
                        <Address xmlns="http://maps.yandex.ru/address/1.x">
                            <country_code>RU</country_code>
                            <postal_code>180002</postal_code>
                            <formatted>Россия, Псков, улица Генерала Маргелова, 9А</formatted>
                            <Component>
                                <kind>country</kind>
                                <name>Россия</name>
                            </Component>
                            <Component>
                                <kind>province</kind>
                                <name>Северо-Западный федеральный округ</name>
                            </Component>
                            <Component>
                                <kind>province</kind>
                                <name>Псковская область</name>
                            </Component>
                            <Component>
                                <kind>area</kind>
                                <name>городской округ Псков</name>
                            </Component>
                            <Component>
                                <kind>locality</kind>
                                <name>Псков</name>
                            </Component>
                            <Component>
                                <kind>street</kind>
                                <name>улица Генерала Маргелова</name>
                            </Component>
                            <Component>
                                <kind>house</kind>
                                <name>9А</name>
                            </Component>
                        </Address>
                        <AddressDetails xmlns="urn:oasis:names:tc:ciq:xsdschema:xAL:2.0">
                            <Country>
                                <AddressLine>Россия, Псков, улица Генерала Маргелова, 9А</AddressLine>
                                <CountryNameCode>RU</CountryNameCode>
                                <CountryName>Россия</CountryName>
                                <AdministrativeArea>
                                    <AdministrativeAreaName>Псковская область</AdministrativeAreaName>
                                    <SubAdministrativeArea>
                                        <SubAdministrativeAreaName>городской округ Псков</SubAdministrativeAreaName>
                                        <Locality>
                                            <LocalityName>Псков</LocalityName>
                                            <Thoroughfare>
                                                <ThoroughfareName>улица Генерала Маргелова</ThoroughfareName>
                                                <Premise>
                                                    <PremiseNumber>9А</PremiseNumber>
                                                    <PostalCode>
                                                        <PostalCodeNumber>180002</PostalCodeNumber>
                                                    </PostalCode>
                                                </Premise>
                                            </Thoroughfare>
                                        </Locality>
                                    </SubAdministrativeArea>
                                </AdministrativeArea>
                            </Country>
                        </AddressDetails>
                    </GeocoderMetaData>
                </metaDataProperty>
                <description xmlns="http://www.opengis.net/gml">Псков, Россия</description>
                <name xmlns="http://www.opengis.net/gml">улица Генерала Маргелова, 9А</name>
                <boundedBy xmlns="http://www.opengis.net/gml">
                    <Envelope>
                        <lowerCorner>28.288856 57.793682</lowerCorner>
                        <upperCorner>28.297066 57.798066</upperCorner>
                    </Envelope>
                </boundedBy>
                <Point xmlns="http://www.opengis.net/gml">
                    <pos>28.292961 57.795874</pos>
                </Point>
            </GeoObject>
        </featureMember>
        <featureMember xmlns="http://www.opengis.net/gml">
            <GeoObject xmlns="http://maps.yandex.ru/ymaps/1.x" xmlns:gml="http://www.opengis.net/gml" gml:id="2">
                <metaDataProperty xmlns="http://www.opengis.net/gml">
                    <GeocoderMetaData xmlns="http://maps.yandex.ru/geocoder/1.x">
                        <kind>house</kind>
                        <text>Россия, Тула, улица Генерала Маргелова, 9А</text>
                        <precision>exact</precision>
                        <Address xmlns="http://maps.yandex.ru/address/1.x">
                            <country_code>RU</country_code>
                            <formatted>Россия, Тула, улица Генерала Маргелова, 9А</formatted>
                            <Component>
                                <kind>country</kind>
                                <name>Россия</name>
                            </Component>
                            <Component>
                                <kind>province</kind>
                                <name>Центральный федеральный округ</name>
                            </Component>
                            <Component>
                                <kind>province</kind>
                                <name>Тульская область</name>
                            </Component>
                            <Component>
                                <kind>area</kind>
                                <name>муниципальное образование Тула</name>
                            </Component>
                            <Component>
                                <kind>locality</kind>
                                <name>Тула</name>
                            </Component>
                            <Component>
                                <kind>street</kind>
                                <name>улица Генерала Маргелова</name>
                            </Component>
                            <Component>
                                <kind>house</kind>
                                <name>9А</name>
                            </Component>
                        </Address>
                        <AddressDetails xmlns="urn:oasis:names:tc:ciq:xsdschema:xAL:2.0">
                            <Country>
                                <AddressLine>Россия, Тула, улица Генерала Маргелова, 9А</AddressLine>
                                <CountryNameCode>RU</CountryNameCode>
                                <CountryName>Россия</CountryName>
                                <AdministrativeArea>
                                    <AdministrativeAreaName>Тульская область</AdministrativeAreaName>
                                    <SubAdministrativeArea>
                                        <SubAdministrativeAreaName>муниципальное образование Тула</SubAdministrativeAreaName>
                                        <Locality>
                                            <LocalityName>Тула</LocalityName>
                                            <Thoroughfare>
                                                <ThoroughfareName>улица Генерала Маргелова</ThoroughfareName>
                                                <Premise>
                                                    <PremiseNumber>9А</PremiseNumber>
                                                </Premise>
                                            </Thoroughfare>
                                        </Locality>
                                    </SubAdministrativeArea>
                                </AdministrativeArea>
                            </Country>
                        </AddressDetails>
                    </GeocoderMetaData>
                </metaDataProperty>
                <description xmlns="http://www.opengis.net/gml">Тула, Россия</description>
                <name xmlns="http://www.opengis.net/gml">улица Генерала Маргелова, 9А</name>
                <boundedBy xmlns="http://www.opengis.net/gml">
                    <Envelope>
                        <lowerCorner>37.563539 54.144018</lowerCorner>
                        <upperCorner>37.571749 54.148839</upperCorner>
                    </Envelope>
                </boundedBy>
                <Point xmlns="http://www.opengis.net/gml">
                    <pos>37.567644 54.146429</pos>
                </Point>
            </GeoObject>
        </featureMember>
        <featureMember xmlns="http://www.opengis.net/gml">
            <GeoObject xmlns="http://maps.yandex.ru/ymaps/1.x" xmlns:gml="http://www.opengis.net/gml" gml:id="3">
                <metaDataProperty xmlns="http://www.opengis.net/gml">
                    <GeocoderMetaData xmlns="http://maps.yandex.ru/geocoder/1.x">
                        <kind>house</kind>
                        <text>Россия, Ставрополь, улица Генерала Маргелова, 9</text>
                        <precision>number</precision>
                        <Address xmlns="http://maps.yandex.ru/address/1.x">
                            <country_code>RU</country_code>
                            <formatted>Россия, Ставрополь, улица Генерала Маргелова, 9</formatted>
                            <Component>
                                <kind>country</kind>
                                <name>Россия</name>
                            </Component>
                            <Component>
                                <kind>province</kind>
                                <name>Северо-Кавказский федеральный округ</name>
                            </Component>
                            <Component>
                                <kind>province</kind>
                                <name>Ставропольский край</name>
                            </Component>
                            <Component>
                                <kind>area</kind>
                                <name>городской округ Ставрополь</name>
                            </Component>
                            <Component>
                                <kind>locality</kind>
                                <name>Ставрополь</name>
                            </Component>
                            <Component>
                                <kind>street</kind>
                                <name>улица Генерала Маргелова</name>
                            </Component>
                            <Component>
                                <kind>house</kind>
                                <name>9</name>
                            </Component>
                        </Address>
                        <AddressDetails xmlns="urn:oasis:names:tc:ciq:xsdschema:xAL:2.0">
                            <Country>
                                <AddressLine>Россия, Ставрополь, улица Генерала Маргелова, 9</AddressLine>
                                <CountryNameCode>RU</CountryNameCode>
                                <CountryName>Россия</CountryName>
                                <AdministrativeArea>
                                    <AdministrativeAreaName>Ставропольский край</AdministrativeAreaName>
                                    <SubAdministrativeArea>
                                        <SubAdministrativeAreaName>городской округ Ставрополь</SubAdministrativeAreaName>
                                        <Locality>
                                            <LocalityName>Ставрополь</LocalityName>
                                            <Thoroughfare>
                                                <ThoroughfareName>улица Генерала Маргелова</ThoroughfareName>
                                                <Premise>
                                                    <PremiseNumber>9</PremiseNumber>
                                                </Premise>
                                            </Thoroughfare>
                                        </Locality>
                                    </SubAdministrativeArea>
                                </AdministrativeArea>
                            </Country>
                        </AddressDetails>
                    </GeocoderMetaData>
                </metaDataProperty>
                <description xmlns="http://www.opengis.net/gml">Ставрополь, Россия</description>
                <name xmlns="http://www.opengis.net/gml">улица Генерала Маргелова, 9</name>
                <boundedBy xmlns="http://www.opengis.net/gml">
                    <Envelope>
                        <lowerCorner>41.889232 45.019111</lowerCorner>
                        <upperCorner>41.897443 45.024934</upperCorner>
                    </Envelope>
                </boundedBy>
                <Point xmlns="http://www.opengis.net/gml">
                    <pos>41.893338 45.022023</pos>
                </Point>
            </GeoObject>
        </featureMember>
        <featureMember xmlns="http://www.opengis.net/gml">
            <GeoObject xmlns="http://maps.yandex.ru/ymaps/1.x" xmlns:gml="http://www.opengis.net/gml" gml:id="4">
                <metaDataProperty xmlns="http://www.opengis.net/gml">
                    <GeocoderMetaData xmlns="http://maps.yandex.ru/geocoder/1.x">
                        <kind>house</kind>
                        <text>Беларусь, Витебская область, Новополоцк, улица Маргелова, 9</text>
                        <precision>number</precision>
                        <Address xmlns="http://maps.yandex.ru/address/1.x">
                            <country_code>BY</country_code>
                            <formatted>Беларусь, Витебская область, Новополоцк, улица Маргелова, 9</formatted>
                            <Component>
                                <kind>country</kind>
                                <name>Беларусь</name>
                            </Component>
                            <Component>
                                <kind>province</kind>
                                <name>Витебская область</name>
                            </Component>
                            <Component>
                                <kind>locality</kind>
                                <name>Новополоцк</name>
                            </Component>
                            <Component>
                                <kind>street</kind>
                                <name>улица Маргелова</name>
                            </Component>
                            <Component>
                                <kind>house</kind>
                                <name>9</name>
                            </Component>
                        </Address>
                        <AddressDetails xmlns="urn:oasis:names:tc:ciq:xsdschema:xAL:2.0">
                            <Country>
                                <AddressLine>Беларусь, Витебская область, Новополоцк, улица Маргелова, 9</AddressLine>
                                <CountryNameCode>BY</CountryNameCode>
                                <CountryName>Беларусь</CountryName>
                                <AdministrativeArea>
                                    <AdministrativeAreaName>Витебская область</AdministrativeAreaName>
                                    <Locality>
                                        <LocalityName>Новополоцк</LocalityName>
                                        <Thoroughfare>
                                            <ThoroughfareName>улица Маргелова</ThoroughfareName>
                                            <Premise>
                                                <PremiseNumber>9</PremiseNumber>
                                            </Premise>
                                        </Thoroughfare>
                                    </Locality>
                                </AdministrativeArea>
                            </Country>
                        </AddressDetails>
                    </GeocoderMetaData>
                </metaDataProperty>
                <description xmlns="http://www.opengis.net/gml">Новополоцк, Витебская область, Беларусь</description>
                <name xmlns="http://www.opengis.net/gml">улица Маргелова, 9</name>
                <boundedBy xmlns="http://www.opengis.net/gml">
                    <Envelope>
                        <lowerCorner>28.613579 55.574065</lowerCorner>
                        <upperCorner>28.621789 55.578716</upperCorner>
                    </Envelope>
                </boundedBy>
                <Point xmlns="http://www.opengis.net/gml">
                    <pos>28.617684 55.576391</pos>
                </Point>
            </GeoObject>
        </featureMember>
        <featureMember xmlns="http://www.opengis.net/gml">
            <GeoObject xmlns="http://maps.yandex.ru/ymaps/1.x" xmlns:gml="http://www.opengis.net/gml" gml:id="5">
                <metaDataProperty xmlns="http://www.opengis.net/gml">
                    <GeocoderMetaData xmlns="http://maps.yandex.ru/geocoder/1.x">
                        <kind>house</kind>
                        <text>Беларусь, Минск, улица Маргелова, 10</text>
                        <precision>near</precision>
                        <Address xmlns="http://maps.yandex.ru/address/1.x">
                            <country_code>BY</country_code>
                            <formatted>Беларусь, Минск, улица Маргелова, 10</formatted>
                            <Component>
                                <kind>country</kind>
                                <name>Беларусь</name>
                            </Component>
                            <Component>
                                <kind>province</kind>
                                <name>Минск</name>
                            </Component>
                            <Component>
                                <kind>locality</kind>
                                <name>Минск</name>
                            </Component>
                            <Component>
                                <kind>street</kind>
                                <name>улица Маргелова</name>
                            </Component>
                            <Component>
                                <kind>house</kind>
                                <name>10</name>
                            </Component>
                        </Address>
                        <AddressDetails xmlns="urn:oasis:names:tc:ciq:xsdschema:xAL:2.0">
                            <Country>
                                <AddressLine>Беларусь, Минск, улица Маргелова, 10</AddressLine>
                                <CountryNameCode>BY</CountryNameCode>
                                <CountryName>Беларусь</CountryName>
                                <AdministrativeArea>
                                    <AdministrativeAreaName>Минск</AdministrativeAreaName>
                                    <Locality>
                                        <LocalityName>Минск</LocalityName>
                                        <Thoroughfare>
                                            <ThoroughfareName>улица Маргелова</ThoroughfareName>
                                            <Premise>
                                                <PremiseNumber>10</PremiseNumber>
                                            </Premise>
                                        </Thoroughfare>
                                    </Locality>
                                </AdministrativeArea>
                            </Country>
                        </AddressDetails>
                    </GeocoderMetaData>
                </metaDataProperty>
                <description xmlns="http://www.opengis.net/gml">Минск, Беларусь</description>
                <name xmlns="http://www.opengis.net/gml">улица Маргелова, 10</name>
                <boundedBy xmlns="http://www.opengis.net/gml">
                    <Envelope>
                        <lowerCorner>27.885871 53.875358</lowerCorner>
                        <upperCorner>27.894082 53.880209</upperCorner>
                    </Envelope>
                </boundedBy>
                <Point xmlns="http://www.opengis.net/gml">
                    <pos>27.889977 53.877784</pos>
                </Point>
            </GeoObject>
        </featureMember>
        <featureMember xmlns="http://www.opengis.net/gml">
            <GeoObject xmlns="http://maps.yandex.ru/ymaps/1.x" xmlns:gml="http://www.opengis.net/gml" gml:id="6">
                <metaDataProperty xmlns="http://www.opengis.net/gml">
                    <GeocoderMetaData xmlns="http://maps.yandex.ru/geocoder/1.x">
                        <kind>house</kind>
                        <text>Россия, Свердловская область, Берёзовский городской округ, коттеджный поселок Европа 2, 17</text>
                        <precision>near</precision>
                        <Address xmlns="http://maps.yandex.ru/address/1.x">
                            <country_code>RU</country_code>
                            <formatted>Россия, Свердловская область, Берёзовский городской округ, коттеджный поселок Европа 2, 17</formatted>
                            <Component>
                                <kind>country</kind>
                                <name>Россия</name>
                            </Component>
                            <Component>
                                <kind>province</kind>
                                <name>Уральский федеральный округ</name>
                            </Component>
                            <Component>
                                <kind>province</kind>
                                <name>Свердловская область</name>
                            </Component>
                            <Component>
                                <kind>area</kind>
                                <name>Берёзовский городской округ</name>
                            </Component>
                            <Component>
                                <kind>locality</kind>
                                <name>коттеджный поселок Европа 2</name>
                            </Component>
                            <Component>
                                <kind>house</kind>
                                <name>17</name>
                            </Component>
                        </Address>
                        <AddressDetails xmlns="urn:oasis:names:tc:ciq:xsdschema:xAL:2.0">
                            <Country>
                                <AddressLine>Россия, Свердловская область, Берёзовский городской округ, коттеджный поселок Европа 2, 17</AddressLine>
                                <CountryNameCode>RU</CountryNameCode>
                                <CountryName>Россия</CountryName>
                                <AdministrativeArea>
                                    <AdministrativeAreaName>Свердловская область</AdministrativeAreaName>
                                    <SubAdministrativeArea>
                                        <SubAdministrativeAreaName>Берёзовский городской округ</SubAdministrativeAreaName>
                                        <Locality>
                                            <LocalityName>коттеджный поселок Европа 2</LocalityName>
                                            <Premise>
                                                <PremiseNumber>17</PremiseNumber>
                                            </Premise>
                                        </Locality>
                                    </SubAdministrativeArea>
                                </AdministrativeArea>
                            </Country>
                        </AddressDetails>
                    </GeocoderMetaData>
                </metaDataProperty>
                <description xmlns="http://www.opengis.net/gml">Берёзовский городской округ, Свердловская область, Россия</description>
                <name xmlns="http://www.opengis.net/gml">коттеджный поселок Европа 2, 17</name>
                <boundedBy xmlns="http://www.opengis.net/gml">
                    <Envelope>
                        <lowerCorner>60.817732 56.869653</lowerCorner>
                        <upperCorner>60.825943 56.874149</upperCorner>
                    </Envelope>
                </boundedBy>
                <Point xmlns="http://www.opengis.net/gml">
                    <pos>60.821838 56.871901</pos>
                </Point>
            </GeoObject>
        </featureMember>
        <featureMember xmlns="http://www.opengis.net/gml">
            <GeoObject xmlns="http://maps.yandex.ru/ymaps/1.x" xmlns:gml="http://www.opengis.net/gml" gml:id="7">
                <metaDataProperty xmlns="http://www.opengis.net/gml">
                    <GeocoderMetaData xmlns="http://maps.yandex.ru/geocoder/1.x">
                        <kind>house</kind>
                        <text>Беларусь, Витебск, микрорайон Юг-7А, улица Генерала Маргелова, 1</text>
                        <precision>near</precision>
                        <Address xmlns="http://maps.yandex.ru/address/1.x">
                            <country_code>BY</country_code>
                            <formatted>Беларусь, Витебск, микрорайон Юг-7А, улица Генерала Маргелова, 1</formatted>
                            <Component>
                                <kind>country</kind>
                                <name>Беларусь</name>
                            </Component>
                            <Component>
                                <kind>province</kind>
                                <name>Витебская область</name>
                            </Component>
                            <Component>
                                <kind>area</kind>
                                <name>Витебск</name>
                            </Component>
                            <Component>
                                <kind>locality</kind>
                                <name>Витебск</name>
                            </Component>
                            <Component>
                                <kind>district</kind>
                                <name>микрорайон Юг-7А</name>
                            </Component>
                            <Component>
                                <kind>street</kind>
                                <name>улица Генерала Маргелова</name>
                            </Component>
                            <Component>
                                <kind>house</kind>
                                <name>1</name>
                            </Component>
                        </Address>
                        <AddressDetails xmlns="urn:oasis:names:tc:ciq:xsdschema:xAL:2.0">
                            <Country>
                                <AddressLine>Беларусь, Витебск, микрорайон Юг-7А, улица Генерала Маргелова, 1</AddressLine>
                                <CountryNameCode>BY</CountryNameCode>
                                <CountryName>Беларусь</CountryName>
                                <AdministrativeArea>
                                    <AdministrativeAreaName>Витебская область</AdministrativeAreaName>
                                    <SubAdministrativeArea>
                                        <SubAdministrativeAreaName>Витебск</SubAdministrativeAreaName>
                                        <Locality>
                                            <LocalityName>Витебск</LocalityName>
                                            <DependentLocality>
                                                <DependentLocalityName>микрорайон Юг-7А</DependentLocalityName>
                                                <Thoroughfare>
                                                    <ThoroughfareName>улица Генерала Маргелова</ThoroughfareName>
                                                    <Premise>
                                                        <PremiseNumber>1</PremiseNumber>
                                                    </Premise>
                                                </Thoroughfare>
                                            </DependentLocality>
                                        </Locality>
                                    </SubAdministrativeArea>
                                </AdministrativeArea>
                            </Country>
                        </AddressDetails>
                    </GeocoderMetaData>
                </metaDataProperty>
                <description xmlns="http://www.opengis.net/gml">микрорайон Юг-7А, Витебск, Беларусь</description>
                <name xmlns="http://www.opengis.net/gml">улица Генерала Маргелова, 1</name>
                <boundedBy xmlns="http://www.opengis.net/gml">
                    <Envelope>
                        <lowerCorner>30.205294 55.158457</lowerCorner>
                        <upperCorner>30.213505 55.163158</upperCorner>
                    </Envelope>
                </boundedBy>
                <Point xmlns="http://www.opengis.net/gml">
                    <pos>30.2094 55.160807</pos>
                </Point>
            </GeoObject>
        </featureMember>
        <featureMember xmlns="http://www.opengis.net/gml">
            <GeoObject xmlns="http://maps.yandex.ru/ymaps/1.x" xmlns:gml="http://www.opengis.net/gml" gml:id="8">
                <metaDataProperty xmlns="http://www.opengis.net/gml">
                    <GeocoderMetaData xmlns="http://maps.yandex.ru/geocoder/1.x">
                        <kind>house</kind>
                        <text>Россия, Омск, улица Василия Маргелова, 3/1</text>
                        <precision>near</precision>
                        <Address xmlns="http://maps.yandex.ru/address/1.x">
                            <country_code>RU</country_code>
                            <formatted>Россия, Омск, улица Василия Маргелова, 3/1</formatted>
                            <Component>
                                <kind>country</kind>
                                <name>Россия</name>
                            </Component>
                            <Component>
                                <kind>province</kind>
                                <name>Сибирский федеральный округ</name>
                            </Component>
                            <Component>
                                <kind>province</kind>
                                <name>Омская область</name>
                            </Component>
                            <Component>
                                <kind>area</kind>
                                <name>городской округ Омск</name>
                            </Component>
                            <Component>
                                <kind>locality</kind>
                                <name>Омск</name>
                            </Component>
                            <Component>
                                <kind>street</kind>
                                <name>улица Василия Маргелова</name>
                            </Component>
                            <Component>
                                <kind>house</kind>
                                <name>3/1</name>
                            </Component>
                        </Address>
                        <AddressDetails xmlns="urn:oasis:names:tc:ciq:xsdschema:xAL:2.0">
                            <Country>
                                <AddressLine>Россия, Омск, улица Василия Маргелова, 3/1</AddressLine>
                                <CountryNameCode>RU</CountryNameCode>
                                <CountryName>Россия</CountryName>
                                <AdministrativeArea>
                                    <AdministrativeAreaName>Омская область</AdministrativeAreaName>
                                    <SubAdministrativeArea>
                                        <SubAdministrativeAreaName>городской округ Омск</SubAdministrativeAreaName>
                                        <Locality>
                                            <LocalityName>Омск</LocalityName>
                                            <Thoroughfare>
                                                <ThoroughfareName>улица Василия Маргелова</ThoroughfareName>
                                                <Premise>
                                                    <PremiseNumber>3/1</PremiseNumber>
                                                </Premise>
                                            </Thoroughfare>
                                        </Locality>
                                    </SubAdministrativeArea>
                                </AdministrativeArea>
                            </Country>
                        </AddressDetails>
                    </GeocoderMetaData>
                </metaDataProperty>
                <description xmlns="http://www.opengis.net/gml">Омск, Россия</description>
                <name xmlns="http://www.opengis.net/gml">улица Василия Маргелова, 3/1</name>
                <boundedBy xmlns="http://www.opengis.net/gml">
                    <Envelope>
                        <lowerCorner>73.490841 54.881505</lowerCorner>
                        <upperCorner>73.499052 54.886238</upperCorner>
                    </Envelope>
                </boundedBy>
                <Point xmlns="http://www.opengis.net/gml">
                    <pos>73.494946 54.883871</pos>
                </Point>
            </GeoObject>
        </featureMember>
        <featureMember xmlns="http://www.opengis.net/gml">
            <GeoObject xmlns="http://maps.yandex.ru/ymaps/1.x" xmlns:gml="http://www.opengis.net/gml" gml:id="9">
                <metaDataProperty xmlns="http://www.opengis.net/gml">
                    <GeocoderMetaData xmlns="http://maps.yandex.ru/geocoder/1.x">
                        <kind>house</kind>
                        <text>Россия, Ульяновск, проспект Генерала Маргелова, 11</text>
                        <precision>near</precision>
                        <Address xmlns="http://maps.yandex.ru/address/1.x">
                            <country_code>RU</country_code>
                            <postal_code>432072</postal_code>
                            <formatted>Россия, Ульяновск, проспект Генерала Маргелова, 11</formatted>
                            <Component>
                                <kind>country</kind>
                                <name>Россия</name>
                            </Component>
                            <Component>
                                <kind>province</kind>
                                <name>Приволжский федеральный округ</name>
                            </Component>
                            <Component>
                                <kind>province</kind>
                                <name>Ульяновская область</name>
                            </Component>
                            <Component>
                                <kind>area</kind>
                                <name>городской округ Ульяновск</name>
                            </Component>
                            <Component>
                                <kind>locality</kind>
                                <name>Ульяновск</name>
                            </Component>
                            <Component>
                                <kind>street</kind>
                                <name>проспект Генерала Маргелова</name>
                            </Component>
                            <Component>
                                <kind>house</kind>
                                <name>11</name>
                            </Component>
                        </Address>
                        <AddressDetails xmlns="urn:oasis:names:tc:ciq:xsdschema:xAL:2.0">
                            <Country>
                                <AddressLine>Россия, Ульяновск, проспект Генерала Маргелова, 11</AddressLine>
                                <CountryNameCode>RU</CountryNameCode>
                                <CountryName>Россия</CountryName>
                                <AdministrativeArea>
                                    <AdministrativeAreaName>Ульяновская область</AdministrativeAreaName>
                                    <SubAdministrativeArea>
                                        <SubAdministrativeAreaName>городской округ Ульяновск</SubAdministrativeAreaName>
                                        <Locality>
                                            <LocalityName>Ульяновск</LocalityName>
                                            <Thoroughfare>
                                                <ThoroughfareName>проспект Генерала Маргелова</ThoroughfareName>
                                                <Premise>
                                                    <PremiseNumber>11</PremiseNumber>
                                                    <PostalCode>
                                                        <PostalCodeNumber>432072</PostalCodeNumber>
                                                    </PostalCode>
                                                </Premise>
                                            </Thoroughfare>
                                        </Locality>
                                    </SubAdministrativeArea>
                                </AdministrativeArea>
                            </Country>
                        </AddressDetails>
                    </GeocoderMetaData>
                </metaDataProperty>
                <description xmlns="http://www.opengis.net/gml">Ульяновск, Россия</description>
                <name xmlns="http://www.opengis.net/gml">проспект Генерала Маргелова, 11</name>
                <boundedBy xmlns="http://www.opengis.net/gml">
                    <Envelope>
                        <lowerCorner>48.582076 54.3575</lowerCorner>
                        <upperCorner>48.590287 54.362295</upperCorner>
                    </Envelope>
                </boundedBy>
                <Point xmlns="http://www.opengis.net/gml">
                    <pos>48.586182 54.359898</pos>
                </Point>
            </GeoObject>
        </featureMember>
        <featureMember xmlns="http://www.opengis.net/gml">
            <GeoObject xmlns="http://maps.yandex.ru/ymaps/1.x" xmlns:gml="http://www.opengis.net/gml" gml:id="10">
                <metaDataProperty xmlns="http://www.opengis.net/gml">
                    <GeocoderMetaData xmlns="http://maps.yandex.ru/geocoder/1.x">
                        <kind>house</kind>
                        <text>Россия, Краснодарский край, Темрюкский район, посёлок За Родину, микрорайон Ключевой, улица Маргелова, 9</text>
                        <precision>number</precision>
                        <Address xmlns="http://maps.yandex.ru/address/1.x">
                            <country_code>RU</country_code>
                            <formatted>Россия, Краснодарский край, Темрюкский район, посёлок За Родину, микрорайон Ключевой, улица Маргелова, 9</formatted>
                            <Component>
                                <kind>country</kind>
                                <name>Россия</name>
                            </Component>
                            <Component>
                                <kind>province</kind>
                                <name>Южный федеральный округ</name>
                            </Component>
                            <Component>
                                <kind>province</kind>
                                <name>Краснодарский край</name>
                            </Component>
                            <Component>
                                <kind>area</kind>
                                <name>Темрюкский район</name>
                            </Component>
                            <Component>
                                <kind>locality</kind>
                                <name>посёлок За Родину</name>
                            </Component>
                            <Component>
                                <kind>district</kind>
                                <name>микрорайон Ключевой</name>
                            </Component>
                            <Component>
                                <kind>street</kind>
                                <name>улица Маргелова</name>
                            </Component>
                            <Component>
                                <kind>house</kind>
                                <name>9</name>
                            </Component>
                        </Address>
                        <AddressDetails xmlns="urn:oasis:names:tc:ciq:xsdschema:xAL:2.0">
                            <Country>
                                <AddressLine>Россия, Краснодарский край, Темрюкский район, посёлок За Родину, микрорайон Ключевой, улица Маргелова, 9</AddressLine>
                                <CountryNameCode>RU</CountryNameCode>
                                <CountryName>Россия</CountryName>
                                <AdministrativeArea>
                                    <AdministrativeAreaName>Краснодарский край</AdministrativeAreaName>
                                    <SubAdministrativeArea>
                                        <SubAdministrativeAreaName>Темрюкский район</SubAdministrativeAreaName>
                                        <Locality>
                                            <LocalityName>посёлок За Родину</LocalityName>
                                            <DependentLocality>
                                                <DependentLocalityName>микрорайон Ключевой</DependentLocalityName>
                                                <Thoroughfare>
                                                    <ThoroughfareName>улица Маргелова</ThoroughfareName>
                                                    <Premise>
                                                        <PremiseNumber>9</PremiseNumber>
                                                    </Premise>
                                                </Thoroughfare>
                                            </DependentLocality>
                                        </Locality>
                                    </SubAdministrativeArea>
                                </AdministrativeArea>
                            </Country>
                        </AddressDetails>
                    </GeocoderMetaData>
                </metaDataProperty>
                <description xmlns="http://www.opengis.net/gml">микрорайон Ключевой, посёлок За Родину, Темрюкский район, Краснодарский край, Россия</description>
                <name xmlns="http://www.opengis.net/gml">улица Маргелова, 9</name>
                <boundedBy xmlns="http://www.opengis.net/gml">
                    <Envelope>
                        <lowerCorner>37.080793 45.346946</lowerCorner>
                        <upperCorner>37.089004 45.352736</upperCorner>
                    </Envelope>
                </boundedBy>
                <Point xmlns="http://www.opengis.net/gml">
                    <pos>37.084898 45.349841</pos>
                </Point>
            </GeoObject>
        </featureMember>
    </GeoObjectCollection>
</ymaps>';
    public function __construct(){
        parent::__construct();
    }
    
    public function parse($address = null) {
        /*$address = $this->input->post('address');
        $address = str_replace(" ", "+", $address);
        
        $this->load->library('curl');
        $url = "https://geocode-maps.yandex.ru/1.x/?apikey=73a3652f-2229-4b03-90cf-c861907a66fd&geocode=$address&results=10";
        $xml = $this->curl->curlGet($url);
        $element = new SimpleXMLElement($xml);
        
        $element->registerXPathNamespace('ymaps', 'http://maps.yandex.ru/ymaps/1.x');
        $element->registerXPathNamespace('gml',   'http://www.opengis.net/gml');
        $element->registerXPathNamespace("g",     "http://maps.yandex.ru/geocoder/1.x");
        $element->registerXPathNamespace("a",     "http://maps.yandex.ru/address/1.x");

        // $result = $xml->xpath('/ymaps:ymaps/ymaps:GeoObjectCollection/gml:featureMember/ymaps:GeoObject/gml:Point/gml:pos');
        $items = $element->xpath('/ymaps:ymaps/ymaps:GeoObjectCollection/gml:featureMember/ymaps:GeoObject/gml:metaDataProperty/g:GeocoderMetaData/g:text');
        */
        $result = [];
        /*foreach($items as $item) {
            $result[] = (string) $item;
        }*/
        
        echo json_encode(["variants" => $result]);
    }
}
?>