import React from 'react'

export const LeftArrow = (props) => {
  const { onClick } = props;
  return (
    <button className="slider-prev-button" onClick={onClick}>
      ←
    </button>
  );
}
