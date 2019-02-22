import gql from "graphql-tag";

export const ME_QUERY = gql`
    query {
        me {
            id
            name
            email
            points
            primary_color
            secondary_color
        }
    }
`;

export const USERS_QUERY = gql`
    query {
        users {
            id
            name
            email
            points
            primary_color
            secondary_color
        }
    }
`;
